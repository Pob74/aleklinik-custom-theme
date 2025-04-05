document.addEventListener("DOMContentLoaded", function () {
  // Get all sidebar toggle buttons
  const toggleButtons = document.querySelectorAll(".sidebar-toggle")

  // Function to handle toggle click
  function handleToggleClick(e) {
    const button = e.currentTarget
    const targetId = button.getAttribute("data-target")
    const targetMenu = document.getElementById(targetId)
    const arrow = button.querySelector("svg")

    // Toggle the menu visibility
    if (targetMenu) {
      const isHidden = targetMenu.classList.contains("hidden")

      // Show/hide the menu
      targetMenu.classList.toggle("hidden")

      // Rotate the arrow
      if (isHidden) {
        arrow.classList.add("rotate-180")
      } else {
        arrow.classList.remove("rotate-180")
      }
    }
  }

  // Add click event listeners to all toggle buttons
  toggleButtons.forEach((button) => {
    button.addEventListener("click", handleToggleClick)
  })

  // Auto-expand the section containing the current page
  const currentLinks = document.querySelectorAll(
    ".bg-blue-50, .bg-green-50, .bg-purple-50"
  )
  currentLinks.forEach((link) => {
    const menu = link.closest("nav")
    if (menu) {
      menu.classList.remove("hidden")
      const button = menu.previousElementSibling
      if (button && button.classList.contains("sidebar-toggle")) {
        const arrow = button.querySelector("svg")
        if (arrow) {
          arrow.classList.add("rotate-180")
        }
      }
    }
  })
})
