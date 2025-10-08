/**
 * Account Modal JavaScript
 * Handles the account modal functionality
 */

(function() {
    'use strict';

    // Wait for DOM to be ready
    document.addEventListener('DOMContentLoaded', function() {
        
        // Get account toggle and modal elements
        const accountToggle = document.querySelector('.account-toggle');
        const accountModal = document.querySelector('.account-modal');
        const closeAccountToggle = document.querySelector('.close-account-toggle');
        
        if (!accountToggle || !accountModal) {
            return;
        }

        // Function to show modal
        function showAccountModal() {
            accountModal.classList.add('showing');
            document.body.classList.add('showing-account-modal');
            accountToggle.setAttribute('aria-expanded', 'true');
            
            // Focus on the modal content
            const modalContent = accountModal.querySelector('.modal-content');
            if (modalContent) {
                modalContent.focus();
            }
        }

        // Function to hide modal
        function hideAccountModal() {
            accountModal.classList.remove('showing');
            document.body.classList.remove('showing-account-modal');
            accountToggle.setAttribute('aria-expanded', 'false');
            
            // Return focus to toggle button
            accountToggle.focus();
        }

        // Event listener for account toggle
        accountToggle.addEventListener('click', function(e) {
            e.preventDefault();
            
            if (accountModal.classList.contains('showing')) {
                hideAccountModal();
            } else {
                showAccountModal();
            }
        });

        // Event listener for close button
        if (closeAccountToggle) {
            closeAccountToggle.addEventListener('click', function(e) {
                e.preventDefault();
                hideAccountModal();
            });
        }

        // Event listener for clicking outside modal
        accountModal.addEventListener('click', function(e) {
            if (e.target === accountModal) {
                hideAccountModal();
            }
        });

        // Event listener for escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && accountModal.classList.contains('showing')) {
                hideAccountModal();
            }
        });

        // Handle login form submission
        const loginForm = accountModal.querySelector('#account-login-form');
        if (loginForm) {
            loginForm.addEventListener('submit', function(e) {
                // Let the form submit normally, but we can add custom handling here if needed
                // For example, AJAX submission or custom validation
            });
        }

    });

})();
