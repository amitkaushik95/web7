// Carousel functionality
class Carousel {
    constructor(element) {
        this.carousel = element;
        this.items = Array.from(this.carousel.querySelectorAll('.carousel-item'));
        this.totalItems = this.items.length;
        this.currentIndex = 0;
        
        // Set up controls
        this.prevButton = this.carousel.querySelector('.carousel-prev');
        this.nextButton = this.carousel.querySelector('.carousel-next');
        
        this.init();
    }
    
    init() {
        // Show first item
        this.items[0].classList.add('active');
        
        // Set up event listeners
        this.prevButton.addEventListener('click', () => this.prev());
        this.nextButton.addEventListener('click', () => this.next());
        
        // Auto advance
        this.startAutoAdvance();
    }
    
    prev() {
        this.goToItem((this.currentIndex - 1 + this.totalItems) % this.totalItems);
    }
    
    next() {
        this.goToItem((this.currentIndex + 1) % this.totalItems);
    }
    
    goToItem(index) {
        // Remove active class from current item
        this.items[this.currentIndex].classList.remove('active');
        
        // Add active class to new item
        this.currentIndex = index;
        this.items[this.currentIndex].classList.add('active');
    }
    
    startAutoAdvance() {
        setInterval(() => this.next(), 5000);
    }
}

// Lead Form functionality
class LeadForm {
    constructor(element) {
        this.form = element;
        this.modal = document.querySelector('.lead-form-modal');
        this.closeButton = this.modal.querySelector('.lead-form-close');
        this.submitButton = this.form.querySelector('button[type="submit"]');
        this.alert = this.form.querySelector('.alert');
        
        this.init();
    }
    
    init() {
        // Set up event listeners
        this.form.addEventListener('submit', (e) => this.handleSubmit(e));
        this.closeButton.addEventListener('click', () => this.closeModal());
        
        // Close modal on outside click
        this.modal.addEventListener('click', (e) => {
            if (e.target === this.modal) this.closeModal();
        });
    }
    
    openModal() {
        this.modal.classList.add('active', 'fade-in');
    }
    
    closeModal() {
        this.modal.classList.remove('active');
        this.form.reset();
        this.hideAlert();
    }
    
    showAlert(message, type = 'error') {
        this.alert.textContent = message;
        this.alert.className = `alert alert-${type} show`;
    }
    
    hideAlert() {
        this.alert.className = 'alert';
    }
    
    async handleSubmit(e) {
        e.preventDefault();
        this.hideAlert();
        
        // Disable submit button
        this.submitButton.disabled = true;
        
        try {
            const formData = new FormData(this.form);
            const response = await fetch('/submit_lead.php', {
                method: 'POST',
                body: formData
            });
            
            const data = await response.json();
            
            if (data.success) {
                this.showAlert(data.message, 'success');
                setTimeout(() => this.closeModal(), 2000);
            } else {
                this.showAlert(data.error || 'An error occurred. Please try again.');
            }
        } catch (error) {
            this.showAlert('An error occurred. Please try again.');
        } finally {
            this.submitButton.disabled = false;
        }
    }
}

// Initialize components when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    // Initialize carousel
    const carousel = new Carousel(document.querySelector('.carousel'));
    
    // Initialize lead form
    const leadForm = new LeadForm(document.querySelector('.lead-form'));
    
    // Set up lead form triggers
    document.querySelectorAll('[data-open-lead-form]').forEach(trigger => {
        trigger.addEventListener('click', () => leadForm.openModal());
    });
}); 