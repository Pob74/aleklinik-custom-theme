class CustomLightbox {
  constructor() {
    this.createLightbox()
    this.bindEvents()
    this.setupMutationObserver()
  }

  createLightbox() {
    const lightbox = document.createElement("div")
    lightbox.className = "custom-lightbox hidden"
    lightbox.innerHTML = `
            <div class="lightbox-overlay"></div>
            <div class="lightbox-content">
                <div class="lightbox-image-container">
                    <img src="" alt="" class="lightbox-image">
                </div>
                <button class="lightbox-prev"><</button>
                <button class="lightbox-next">></button>
                <button class="lightbox-close">×</button>
                <div class="lightbox-counter"></div>
            </div>
        `
    document.body.appendChild(lightbox)

    // Add styles
    const style = document.createElement("style")
    style.textContent = `
            .custom-lightbox {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: 9999;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .custom-lightbox.hidden {
                display: none;
            }
            .lightbox-overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.9);
                z-index: 10000;
            }
            .lightbox-content {
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                z-index: 10001;
                width: 90vw;
                height: 90vh;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .lightbox-image-container {
                height: 100%;
                width: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 40px;
            }
            .lightbox-image {
                width: auto;
                height: auto;
              
            }
            .lightbox-prev,
            .lightbox-next {
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                background: rgba(255, 255, 255, 0.1);
                color: white;
                border: none;
                padding: 20px;
                cursor: pointer;
                font-size: 24px;
                border-radius: 5px;
                transition: background 0.3s;
                z-index: 10002;
            }
            .lightbox-prev:hover,
            .lightbox-next:hover {
                background: rgba(255, 255, 255, 0.2);
            }
            .lightbox-prev {
                left: 20px;
            }
            .lightbox-next {
                right: 20px;
            }
            .lightbox-close {
                position: absolute;
                top: 20px;
                right: 20px;
                background: rgba(255, 255, 255, 0.1);
                border: none;
                color: white;
                font-size: 32px;
                cursor: pointer;
                z-index: 10002;
                width: 40px;
                height: 40px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                transition: background 0.3s;
            }
            .lightbox-close:hover {
                background: rgba(255, 255, 255, 0.2);
            }
            .lightbox-counter {
                position: absolute;
                bottom: 20px;
                left: 50%;
                transform: translateX(-50%);
                color: white;
                font-size: 16px;
                background: rgba(0, 0, 0, 0.5);
                padding: 5px 15px;
                border-radius: 15px;
            }
        `
    document.head.appendChild(style)
  }

  bindEvents() {
    const lightbox = document.querySelector(".custom-lightbox")
    const close = lightbox.querySelector(".lightbox-close")
    const prev = lightbox.querySelector(".lightbox-prev")
    const next = lightbox.querySelector(".lightbox-next")
    const overlay = lightbox.querySelector(".lightbox-overlay")

    close.addEventListener("click", () => this.close())
    overlay.addEventListener("click", () => this.close())
    prev.addEventListener("click", () => this.showPrev())
    next.addEventListener("click", () => this.showNext())

    document.addEventListener("keydown", (e) => {
      if (!lightbox.classList.contains("hidden")) {
        if (e.key === "Escape") this.close()
        if (e.key === "ArrowLeft") this.showPrev()
        if (e.key === "ArrowRight") this.showNext()
      }
    })

    // Initialize gallery triggers
    this.bindLightboxTriggers()
  }

  // New method to bind lightbox triggers
  bindLightboxTriggers() {
    document
      .querySelectorAll(".lightbox:not([data-lightbox-bound])")
      .forEach((trigger) => {
        trigger.dataset.lightboxBound = "true"
        trigger.addEventListener("click", (e) => {
          e.preventDefault()
          this.open(trigger)
        })
      })
  }

  // New method to observe DOM changes
  setupMutationObserver() {
    // Create a MutationObserver to watch for new lightbox elements
    const observer = new MutationObserver((mutations) => {
      let shouldRebind = false

      mutations.forEach((mutation) => {
        if (mutation.type === "childList" && mutation.addedNodes.length > 0) {
          // Check if any added nodes contain lightbox elements
          mutation.addedNodes.forEach((node) => {
            if (node.nodeType === 1) {
              // Element node
              if (node.classList && node.classList.contains("lightbox")) {
                shouldRebind = true
              } else if (node.querySelectorAll) {
                const lightboxes = node.querySelectorAll(".lightbox")
                if (lightboxes.length > 0) {
                  shouldRebind = true
                }
              }
            }
          })
        }
      })

      if (shouldRebind) {
        this.bindLightboxTriggers()
      }
    })

    // Start observing the document with the configured parameters
    observer.observe(document.body, {
      childList: true,
      subtree: true
    })
  }

  open(trigger) {
    // Collect all gallery images
    this.images = Array.from(
      document.querySelectorAll(`[data-gallery='${trigger.dataset.gallery}']`)
    ).map((link) => ({
      src: link.href,
      alt: link.querySelector("img")?.alt || ""
    }))
    this.currentIndex = this.images.findIndex(
      (image) => image.src === trigger.href
    )
    this.showImage()
    document.querySelector(".custom-lightbox").classList.remove("hidden")
    document.body.style.overflow = "hidden"
  }

  close() {
    document.querySelector(".custom-lightbox").classList.add("hidden")
    document.body.style.overflow = ""
  }

  showImage() {
    const lightbox = document.querySelector(".custom-lightbox")
    const img = lightbox.querySelector(".lightbox-image")
    const counter = lightbox.querySelector(".lightbox-counter")
    const currentImage = this.images[this.currentIndex]

    img.src = currentImage.src
    img.alt = currentImage.alt
    counter.textContent = `${this.currentIndex + 1} / ${this.images.length}`
  }

  showPrev() {
    this.currentIndex =
      (this.currentIndex - 1 + this.images.length) % this.images.length
    this.showImage()
  }

  showNext() {
    this.currentIndex = (this.currentIndex + 1) % this.images.length
    this.showImage()
  }
}

// Initialize lightbox when DOM is loaded
document.addEventListener("DOMContentLoaded", () => {
  // Create the lightbox instance
  const lightboxInstance = new CustomLightbox()

  // Expose the instance globally so component scripts can access it
  window.customLightbox = lightboxInstance
})
