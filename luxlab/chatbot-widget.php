<!-- Chatbot Widget -->
<div id="chatbot-widget" class="chatbot-container">
    <div class="chatbot-header">
        <div class="chatbot-title">
            <i class=" logo" src = " "></i>
            <span>Luxaura Assistant</span>
        </div>
        <div class="chatbot-controls">
            <button id="chatbot-minimize" class="chatbot-btn"><i class="fas fa-minus"></i></button>
            <button id="chatbot-close" class="chatbot-btn"><i class="fas fa-times"></i></button>
        </div>
    </div>
    
    <div class="chatbot-body">
        <div id="chatbot-messages" class="chatbot-messages">
            <div class="chatbot-message bot-message">
                <div class="message-avatar">
                    <i class="fas fa-robot"></i>
                </div>
                <div class="message-content">
                    <p>Hello! I'm your Luxaura Assistant. I'm here to help you find the perfect artificial jewelry. How can I assist you today?</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="chatbot-input-container">
        <input type="text" id="chatbot-input" placeholder="Type your message..." maxlength="500">
        <button id="chatbot-send" class="chatbot-send-btn">
            <i class="fas fa-paper-plane"></i>
        </button>
    </div>
    
    <div class="chatbot-quick-replies">
        <button class="quick-reply-btn" data-message="Show me new arrivals">New Arrivals</button>
        <button class="quick-reply-btn" data-message="I need help with sizing">Sizing Help</button>
        <button class="quick-reply-btn" data-message="What are your bestsellers?">Bestsellers</button>
        <button class="quick-reply-btn" data-message="Do you have offers?">Offers</button>
    </div>
</div>

<!-- Chatbot Toggle Button -->
<button id="chatbot-toggle" class="chatbot-toggle-btn">
    <i class="fas fa-comments"></i>
    <span class="notification-dot" style="display: none;"></span>
</button>

<style>
/* Enhanced Chatbot Styles - Luxaura Theme */
.chatbot-container {
    position: fixed;
    bottom: 20px;
    right: 20px;
    width: 380px;
    height: 520px;
    background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
    border-radius: 20px;
    box-shadow: 0 10px 50px rgba(0,0,0,0.15), 0 0 0 1px rgba(0,0,0,0.05);
    display: flex;
    flex-direction: column;
    z-index: 1000;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    backdrop-filter: blur(10px);
    overflow: hidden;
}

.chatbot-container.minimized {
    height: 70px;
    overflow: hidden;
}

.chatbot-container.hidden {
    display: none;
}

.chatbot-header {
    background: linear-gradient(135deg, #ff6b6b 0%, #ff8e8e 50%, #ffa726 100%);
    color: white;
    padding: 20px;
    border-radius: 20px 20px 0 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 2px 10px rgba(255,107,107,0.3);
}

.chatbot-title {
    display: flex;
    align-items: center;
    gap: 12px;
    font-weight: 700;
    font-size: 16px;
}

.chatbot-title i {
    font-size: 20px;
    animation: bounce 2s infinite;
}

@keyframes bounce {
    0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
    40% { transform: translateY(-5px); }
    60% { transform: translateY(-3px); }
}

.chatbot-controls {
    display: flex;
    gap: 8px;
}

.chatbot-btn {
    background: rgba(255,255,255,0.25);
    border: none;
    color: white;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    backdrop-filter: blur(10px);
}

.chatbot-btn:hover {
    background: rgba(255,255,255,0.4);
    transform: scale(1.1);
}

.chatbot-body {
    flex: 1;
    overflow-y: auto;
    padding: 20px;
    background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
}

.chatbot-messages {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.chatbot-message {
    display: flex;
    gap: 12px;
    align-items: flex-end;
    animation: slideIn 0.3s ease-out;
}

@keyframes slideIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

.bot-message {
    flex-direction: row;
    align-self: flex-start;
}

.user-message {
    flex-direction: row-reverse;
    align-self: flex-end;
}

.message-avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
    flex-shrink: 0;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

.bot-message .message-avatar {
    background: linear-gradient(135deg, #ff6b6b 0%, #ffa726 100%);
    color: white;
    animation: pulse 2s infinite;
}

.user-message .message-avatar {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
}

.message-content {
    max-width: 75%;
    padding: 12px 18px;
    border-radius: 20px;
    font-size: 14px;
    line-height: 1.5;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    position: relative;
}

.bot-message .message-content {
    background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
    color: #2c3e50;
    border: 1px solid rgba(255,107,107,0.2);
    border-bottom-left-radius: 5px;
}

.user-message .message-content {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border-bottom-right-radius: 5px;
}

.message-content::before {
    content: '';
    position: absolute;
    width: 0;
    height: 0;
    border-style: solid;
}

.bot-message .message-content::before {
    left: -8px;
    bottom: 0;
    border-width: 0 8px 8px 0;
    border-color: transparent #f8f9fa transparent transparent;
}

.user-message .message-content::before {
    right: -8px;
    bottom: 0;
    border-width: 8px 8px 0 0;
    border-color: #667eea transparent transparent transparent;
}

.chatbot-input-container {
    display: flex;
    padding: 20px;
    gap: 12px;
    background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
    border-top: 1px solid rgba(0,0,0,0.05);
}

#chatbot-input {
    flex: 1;
    padding: 12px 20px;
    border: 2px solid rgba(255,107,107,0.2);
    border-radius: 25px;
    outline: none;
    font-size: 14px;
    background: white;
    transition: all 0.3s ease;
}

#chatbot-input:focus {
    border-color: #ff6b6b;
    box-shadow: 0 0 0 3px rgba(255,107,107,0.1);
}

.chatbot-send-btn {
    background: linear-gradient(135deg, #ff6b6b 0%, #ffa726 100%);
    color: white;
    border: none;
    width: 45px;
    height: 45px;
    border-radius: 50%;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 4px 15px rgba(255,107,107,0.3);
}

.chatbot-send-btn:hover {
    transform: scale(1.1) rotate(5deg);
    box-shadow: 0 6px 20px rgba(255,107,107,0.4);
}

.chatbot-send-btn:active {
    transform: scale(0.95);
}

.chatbot-quick-replies {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    padding: 15px 20px;
    background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
    border-top: 1px solid rgba(0,0,0,0.05);
}

.quick-reply-btn {
    background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
    border: 1px solid rgba(255,107,107,0.3);
    padding: 8px 16px;
    border-radius: 20px;
    font-size: 13px;
    cursor: pointer;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    color: #ff6b6b;
    font-weight: 500;
}

.quick-reply-btn:hover {
    background: linear-gradient(135deg, #ff6b6b 0%, #ffa726 100%);
    color: white;
    border-color: transparent;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(255,107,107,0.3);
}

.chatbot-toggle-btn {
    position: fixed;
    bottom: 30px;
    right: 30px;
    width: 65px;
    height: 65px;
    background: linear-gradient(135deg, #ff6b6b 0%, #ffa726 100%);
    color: white;
    border: none;
    border-radius: 50%;
    cursor: pointer;
    box-shadow: 0 8px 25px rgba(255,107,107,0.4);
    z-index: 1001;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 26px;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    backdrop-filter: blur(10px);
}

.chatbot-toggle-btn:hover {
    transform: scale(1.15) rotate(10deg);
    box-shadow: 0 12px 35px rgba(255,107,107,0.5);
}

.notification-dot {
    position: absolute;
    top: 8px;
    right: 8px;
    width: 14px;
    height: 14px;
    background: linear-gradient(135deg, #ff4757 0%, #ff6b6b 100%);
    border-radius: 50%;
    animation: pulse 2s infinite;
    box-shadow: 0 0 0 0 rgba(255,71,87,0.7);
}

@keyframes pulse {
    0% {
        transform: scale(1);
        box-shadow: 0 0 0 0 rgba(255,71,87,0.7);
    }
    70% {
        transform: scale(1.2);
        box-shadow: 0 0 0 10px rgba(255,71,87,0);
    }
    100% {
        transform: scale(1);
        box-shadow: 0 0 0 0 rgba(255,71,87,0);
    }
}

/* Scrollbar Styling */
.chatbot-body::-webkit-scrollbar {
    width: 6px;
}

.chatbot-body::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 10px;
}

.chatbot-body::-webkit-scrollbar-thumb {
    background: linear-gradient(135deg, #ff6b6b 0%, #ffa726 100%);
    border-radius: 10px;
}

.chatbot-body::-webkit-scrollbar-thumb:hover {
    background: linear-gradient(135deg, #ff4757 0%, #ff6b6b 100%);
}

/* Responsive Design */
@media (max-width: 480px) {
    .chatbot-container {
        width: 100%;
        height: 100%;
        bottom: 0;
        right: 0;
        border-radius: 0;
        border-radius: 0;
    }
    
    .chatbot-container.minimized {
        height: 70px;
    }
    
    .chatbot-toggle-btn {
        bottom: 20px;
        right: 20px;
        width: 55px;
        height: 55px;
        font-size: 22px;
    }
}

/* Loading Animation */
.loading-dots {
    display: inline-block;
}

.loading-dots span {
    display: inline-block;
    width: 6px;
    height: 6px;
    border-radius: 50%;
    background: #ff6b6b;
    margin: 0 2px;
    animation: loading 1.4s infinite ease-in-out both;
}

.loading-dots span:nth-child(1) { animation-delay: -0.32s; }
.loading-dots span:nth-child(2) { animation-delay: -0.16s; }

@keyframes loading {
    0%, 80%, 100% {
        transform: scale(0);
        opacity: 0.5;
    }
    40% {
        transform: scale(1);
        opacity: 1;
    }
}
</style>

<script>
// Chatbot JavaScript
class Chatbot {
    constructor() {
        this.container = document.getElementById('chatbot-widget');
        this.messagesContainer = document.getElementById('chatbot-messages');
        this.input = document.getElementById('chatbot-input');
        this.sendBtn = document.getElementById('chatbot-send');
        this.toggleBtn = document.getElementById('chatbot-toggle');
        this.minimizeBtn = document.getElementById('chatbot-minimize');
        this.closeBtn = document.getElementById('chatbot-close');
        
        this.responses = {
            'hello': 'Hello! Welcome to Luxaura. How can I help you find the perfect jewelry today?',
            'hi': 'Hi there! I\'m here to assist you with any questions about our artificial jewelry collection.',
            'help': 'I can help you with: finding products, checking sizes, viewing new arrivals, or getting information about offers. What would you like to know?',
            'necklace': 'We have exciting new arrivals! Check out our latest collection featuring stunning necklaces, elegant earrings, and beautiful bangles. Would you like me to show you specific categories?',
            'sizing': 'For sizing help, please refer to our size guide on each product page. You can also contact us at support@luxaura.com for personalized assistance.',
            'bestsellers': 'Our bestsellers include traditional necklace sets, contemporary earrings, and elegant bangles. Visit our shop page to see what\'s trending!',
            'offers': 'We currently have special offers! Check our homepage for current promotions and sign up for our newsletter to get exclusive deals.',
            'price': 'Our prices range from ₹299 to ₹2999. Each product page shows detailed pricing. We also offer occasional discounts!',
            'shipping': 'We offer free shipping on orders over ₹999. Standard delivery takes 3-5 business days across India.',
            'return': 'We have a 7-day return policy. Items must be unused and in original packaging. Contact support@luxaura.com for returns.',
            'contact': 'You can reach us at support@luxaura.com or call +91-9876543210. We\'re here to help!'
        };
        
        this.init();
    }
    
    init() {
        this.bindEvents();
        this.loadChatbotState();
    }
    
    bindEvents() {
        this.sendBtn.addEventListener('click', () => this.sendMessage());
        this.input.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') this.sendMessage();
        });
        
        this.toggleBtn.addEventListener('click', () => this.toggleChatbot());
        this.minimizeBtn.addEventListener('click', () => this.minimizeChatbot());
        this.closeBtn.addEventListener('click', () => this.closeChatbot());
        
        // Quick reply buttons
        document.querySelectorAll('.quick-reply-btn').forEach(btn => {
            btn.addEventListener('click', (e) => {
                const message = e.target.dataset.message;
                this.sendMessage(message);
            });
        });
    }
    
    sendMessage(message = null) {
        const text = message || this.input.value.trim();
        if (!text) return;
        
        // Add user message
        this.addMessage(text, 'user');
        this.input.value = '';
        
        // Generate bot response
        setTimeout(() => {
            const response = this.generateResponse(text);
            this.addMessage(response, 'bot');
        }, 500);
    }
    
    addMessage(text, sender) {
        const messageDiv = document.createElement('div');
        messageDiv.className = `chatbot-message ${sender}-message`;
        
        const avatar = document.createElement('div');
        avatar.className = 'message-avatar';
        avatar.innerHTML = sender === 'bot' ? '<i class="fas fa-robot"></i>' : '<i class="fas fa-user"></i>';
        
        const content = document.createElement('div');
        content.className = 'message-content';
        content.innerHTML = `<p>${text}</p>`;
        
        messageDiv.appendChild(avatar);
        messageDiv.appendChild(content);
        
        this.messagesContainer.appendChild(messageDiv);
        this.messagesContainer.scrollTop = this.messagesContainer.scrollHeight;
        
        // Save state
        this.saveChatbotState();
    }
    
    generateResponse(userMessage) {
        const lowerMessage = userMessage.toLowerCase();
        
        // Check for exact matches
        for (const [key, response] of Object.entries(this.responses)) {
            if (lowerMessage.includes(key)) {
                return response;
            }
        }
        
        // Default responses
        if (lowerMessage.includes('product') || lowerMessage.includes('item')) {
            return 'You can browse our complete collection at our shop page. Each product has detailed descriptions, multiple images, and customer reviews. Would you like me to help you find something specific?';
        }
        
        if (lowerMessage.includes('order') || lowerMessage.includes('buy')) {
            return 'To place an order, simply add items to your cart and proceed to checkout. We offer secure payment options and fast delivery across India. Need help with anything specific?';
        }
        
        return 'Thank you for your message! I\'m here to help with any questions about our artificial jewelry collection. You can ask me about products, sizing, offers, or anything else!';
    }
    
    toggleChatbot() {
        const container = document.getElementById('chatbot-widget');
        if (container.classList.contains('hidden')) {
            container.classList.remove('hidden');
            this.toggleBtn.style.display = 'none';
        }
    }
    
    minimizeChatbot() {
        const container = document.getElementById('chatbot-widget');
        container.classList.toggle('minimized');
    }
    
    closeChatbot() {
        const container = document.getElementById('chatbot-widget');
        container.classList.add('hidden');
        this.toggleBtn.style.display = 'flex';
    }
    
    saveChatbotState() {
        const state = {
            isOpen: !document.getElementById('chatbot-widget').classList.contains('hidden'),
            isMinimized: document.getElementById('chatbot-widget').classList.contains('minimized'),
            messages: this.messagesContainer.innerHTML
        };
        localStorage.setItem('chatbotState', JSON.stringify(state));
    }
    
    loadChatbotState() {
        const saved = localStorage.getItem('chatbotState');
        if (saved) {
            const state = JSON.parse(saved);
            if (state.isOpen) {
                document.getElementById('chatbot-widget').classList.remove('hidden');
                document.getElementById('chatbot-toggle').style.display = 'none';
            }
            if (state.isMinimized) {
                document.getElementById('chatbot-widget').classList.add('minimized');
            }
            if (state.messages) {
                this.messagesContainer.innerHTML = state.messages;
            }
        }
    }
}

// Initialize chatbot when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    new Chatbot();
});
</script>
