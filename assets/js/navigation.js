document.addEventListener("DOMContentLoaded", function () {
  console.log("DOM loaded")

  const mobileMenuButton = document.getElementById("mobile-menu-button")
  const navMenu = document.getElementById("nav-menu")
  const overlay = document.getElementById("mobile-menu-overlay")
  const body = document.body
  let isMenuOpen = false

  console.log("Elements found:", {
    mobileMenuButton,
    navMenu,
    overlay
  })

  function toggleMenu() {
    console.log("Toggle menu called, current state:", isMenuOpen)
    isMenuOpen = !isMenuOpen

    // Toggle menu visibility using only Tailwind classes
    if (isMenuOpen) {
      console.log("Opening menu")
      navMenu.classList.remove("translate-x-full")
      navMenu.classList.add("translate-x-0")
      // Update button to close icon
      mobileMenuButton.innerHTML =
        '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>'
    } else {
      console.log("Closing menu")
      navMenu.classList.remove("translate-x-0")
      navMenu.classList.add("translate-x-full")
      // Update button to menu icon
      mobileMenuButton.innerHTML =
        '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>'
    }

    // Toggle overlay
    overlay.classList.toggle("opacity-0", !isMenuOpen)
    overlay.classList.toggle("pointer-events-none", !isMenuOpen)

    // Toggle body overflow
    if (isMenuOpen) {
      body.classList.add("overflow-hidden")
    } else {
      body.classList.remove("overflow-hidden")
    }
  }

  // Toggle menu on button click
  mobileMenuButton.addEventListener("click", function (e) {
    console.log("Button clicked")
    e.preventDefault()
    e.stopPropagation() // Prevent event from bubbling up
    toggleMenu()
  })

  // Close menu when clicking overlay
  overlay.addEventListener("click", function (e) {
    console.log("Overlay clicked")
    e.preventDefault()
    e.stopPropagation() // Prevent event from bubbling up
    if (isMenuOpen) {
      toggleMenu()
    }
  })

  // Close menu when clicking outside on mobile
  document.addEventListener("click", function (event) {
    // Only close if clicking outside both the menu and the button
    if (
      isMenuOpen &&
      !navMenu.contains(event.target) &&
      !mobileMenuButton.contains(event.target) &&
      !overlay.contains(event.target)
    ) {
      console.log("Clicked outside menu")
      toggleMenu()
    }
  })

  // Close menu on window resize if it's open
  window.addEventListener("resize", function () {
    if (window.innerWidth >= 1024 && isMenuOpen) {
      console.log("Window resized to desktop")
      toggleMenu()
    }
  })
})
