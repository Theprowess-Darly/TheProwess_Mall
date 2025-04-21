// Function to toggle dark mode
function toggleDarkMode() {
    // Check if user preference exists in localStorage
    if (localStorage.getItem('color-theme') === 'dark' || 
        (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
        localStorage.setItem('color-theme', 'dark');
    } else {
        document.documentElement.classList.remove('dark');
        localStorage.setItem('color-theme', 'light');
    }
    
    // Update the toggle button icons
    updateToggleIcons();
}

// Function to update toggle button icons based on current theme
function updateToggleIcons() {
    const darkIcon = document.getElementById('theme-toggle-dark-icon');
    const lightIcon = document.getElementById('theme-toggle-light-icon');
    
    if (document.documentElement.classList.contains('dark')) {
        darkIcon.classList.add('hidden');
        lightIcon.classList.remove('hidden');
    } else {
        lightIcon.classList.add('hidden');
        darkIcon.classList.remove('hidden');
    }
}

// Initialize dark mode on page load
document.addEventListener('DOMContentLoaded', function() {
    // Initialize theme based on user preference
    toggleDarkMode();
    
    // Add event listener to toggle button
    const themeToggleBtn = document.getElementById('theme-toggle');
    if (themeToggleBtn) {
        themeToggleBtn.addEventListener('click', function() {
            // Toggle the theme
            if (localStorage.getItem('color-theme') === 'dark') {
                localStorage.setItem('color-theme', 'light');
                document.documentElement.classList.remove('dark');
            } else {
                localStorage.setItem('color-theme', 'dark');
                document.documentElement.classList.add('dark');
            }
            
            // Update the toggle button icons
            updateToggleIcons();
        });
    }
});