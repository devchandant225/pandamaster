<div 
    x-data="{ 
        isOpen: false, 
        step: 0, 
        messages: [{ type: 'bot', text: 'Hi! I\'m here to help you find the perfect Vancouver realtor. Let\'s get started! 👋' }],
        userData: { intent: '', city: '', budget: '', timeline: '', name: '', email: '', phone: '' },
        currentInput: '',
        questions: [
            { question: 'Are you buying or selling?', options: ['Buying', 'Selling', 'Both'], field: 'intent' },
            { question: 'Which city are you interested in?', options: ['Vancouver', 'Burnaby', 'Surrey', 'Richmond', 'Coquitlam', 'North Vancouver'], field: 'city' },
            { question: 'What\'s your budget range?', options: ['Under $500K', '$500K - $750K', '$750K - $1M', '$1M - $1.5M', '$1.5M+'], field: 'budget' },
            { question: 'When are you looking to move forward?', options: ['ASAP', '1-3 Months', '3-6 Months', '6+ Months', 'Just Browsing'], field: 'timeline' },
            { question: 'What\'s your name?', field: 'name', inputType: 'text' },
            { question: 'What\'s your email address?', field: 'email', inputType: 'email' },
            { question: 'And your phone number?', field: 'phone', inputType: 'tel' }
        ],
        handleOptionClick(option, field) {
            this.messages.push({ type: 'user', text: option });
            this.userData[field] = option;
            this.nextStep();
        },
        handleInputSubmit() {
            if (!this.currentInput.trim()) return;
            let field = this.questions[this.step].field;
            this.messages.push({ type: 'user', text: this.currentInput });
            this.userData[field] = this.currentInput;
            this.currentInput = '';
            this.nextStep();
        },
        nextStep() {
            if (this.step < this.questions.length - 1) {
                this.step++;
                setTimeout(() => {
                    this.messages.push({ type: 'bot', text: this.questions[this.step].question });
                }, 500);
            } else {
                this.step++;
                setTimeout(() => {
                    this.messages.push({ type: 'bot', text: 'Perfect! We\'ll connect you with a top Vancouver realtor within 24 hours. Check your email! 🎉' });
                    console.log('Lead captured:', this.userData);
                }, 500);
            }
        },
        reset() {
            this.isOpen = false;
            this.step = 0;
            this.messages = [{ type: 'bot', text: 'Hi! I\'m here to help you find the perfect Vancouver realtor. Let\'s get started! 👋' }];
            this.userData = { intent: '', city: '', budget: '', timeline: '', name: '', email: '', phone: '' };
        }
    }"
>
    <!-- Chat Button -->
    <button
        x-show="!isOpen"
        @click="isOpen = true"
        class="fixed bottom-6 right-6 z-50 bg-[#D4AF37] text-black p-4 rounded-full shadow-2xl hover:bg-[#F4D03F] transition-all hover:scale-110"
        aria-label="Open chat"
    >
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
    </button>

    <!-- Chat Window -->
    <div 
        x-show="isOpen"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 translate-y-4 scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
        class="fixed bottom-6 right-6 z-50 w-[380px] max-w-[calc(100vw-32px)] bg-white rounded-2xl shadow-2xl border-2 border-gray-200 flex flex-col max-h-[600px]"
        style="display: none;"
    >
        <!-- Header -->
        <div class="bg-gradient-to-r from-black to-gray-900 text-white p-5 rounded-t-2xl flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-[#D4AF37] rounded-full flex items-center justify-center">
                    <svg class="w-5 h-5 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                </div>
                <div>
                    <div class="font-bold">888Realty Assistant</div>
                    <div class="text-xs text-gray-300">Online now</div>
                </div>
            </div>
            <button
                @click="isOpen = false"
                class="text-white hover:text-[#D4AF37] transition-colors"
                aria-label="Close chat"
            >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        <!-- Messages -->
        <div class="flex-1 overflow-y-auto p-5 space-y-4 bg-gray-50 h-[400px]" id="chat-messages">
            <template x-for="(message, index) in messages" :key="index">
                <div class="flex" :class="message.type === 'user' ? 'justify-end' : 'justify-start'">
                    <div
                        class="max-w-[80%] p-3 rounded-2xl"
                        :class="message.type === 'user' ? 'bg-[#D4AF37] text-black rounded-tr-none' : 'bg-white border border-gray-200 text-gray-800 rounded-tl-none'"
                        x-text="message.text"
                    ></div>
                </div>
            </template>

            <!-- Options -->
            <div x-show="step < questions.length && questions[step].options" class="space-y-2 pt-2">
                <template x-for="(option, index) in (questions[step] ? questions[step].options : [])" :key="index">
                    <button
                        @click="handleOptionClick(option, questions[step].field)"
                        class="w-full text-left p-3 bg-white border-2 border-gray-200 rounded-xl hover:border-[#D4AF37] hover:bg-gray-50 transition-all flex items-center justify-between group"
                    >
                        <span x-text="option"></span>
                        <svg class="w-4 h-4 text-gray-400 group-hover:text-[#D4AF37] group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </button>
                </template>
            </div>
        </div>

        <!-- Input -->
        <div x-show="step < questions.length && questions[step].inputType" class="p-4 bg-white border-t border-gray-200 rounded-b-2xl">
            <form @submit.prevent="handleInputSubmit" class="flex gap-2">
                <input
                    :type="questions[step] ? questions[step].inputType : 'text'"
                    x-model="currentInput"
                    :placeholder="'Enter your ' + (questions[step] ? questions[step].field : '') + '...'"
                    class="flex-1 border-2 border-gray-200 focus:border-[#D4AF37] rounded-xl px-4 py-2 outline-none"
                    required
                />
                <button 
                    type="submit"
                    class="bg-[#D4AF37] text-black hover:bg-[#F4D03F] rounded-xl px-4 flex items-center justify-center"
                >
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                </button>
            </form>
        </div>

        <!-- Completion -->
        <div x-show="step >= questions.length" class="p-4 bg-white border-t border-gray-200 rounded-b-2xl text-center">
            <p class="text-sm text-gray-600 mb-3">
                Thanks for chatting! Check your email for next steps.
            </p>
            <button 
                @click="reset()"
                class="w-full bg-black text-white hover:bg-gray-900 rounded-xl py-2.5 font-bold"
            >
                Start New Conversation
            </button>
        </div>
    </div>
</div>
