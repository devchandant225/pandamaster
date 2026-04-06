@props(['name', 'label', 'data' => []])

<div class="faq-repeater" data-name="{{ $name }}">
    <label class="flex items-center gap-2 text-sm font-bold text-gray-800 mb-3">
        <i class="fas fa-question-circle text-[#D4AF37]"></i>
        <span>{{ $label }}</span>
    </label>
    
    <div class="faq-items space-y-4">
        @php
            $items = old($name, $data ?: []);
            if (!is_array($items) || empty($items)) {
                $items = [['question' => '', 'answer' => '']];
            }
        @endphp

        @foreach($items as $index => $item)
            @php
                $question = is_array($item) ? ($item['question'] ?? '') : '';
                $answer = is_array($item) ? ($item['answer'] ?? '') : '';
            @endphp
            <div class="faq-item group relative bg-gray-50 border-2 border-gray-200 rounded-xl p-5 hover:border-[#D4AF37]/50 transition-all">
                <div class="absolute top-3 right-3 opacity-0 group-hover:opacity-100 transition-opacity">
                    <button type="button" class="remove-faq p-2 text-red-500 hover:bg-red-100 rounded-lg transition-colors" title="Remove FAQ">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
                <div class="flex items-center gap-2 mb-3">
                    <span class="flex items-center justify-center w-6 h-6 bg-[#D4AF37] text-black text-xs font-bold rounded-full">
                        {{ $index + 1 }}
                    </span>
                    <span class="text-sm font-bold text-gray-700">FAQ Item</span>
                </div>
                <div class="grid grid-cols-1 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-600 mb-1.5">
                            <i class="fas fa-question text-[#D4AF37]"></i> Question
                        </label>
                        <input type="text" 
                            name="{{ $name }}[{{ $index }}][question]" 
                            value="{{ $question }}"
                            class="w-full px-4 py-2.5 text-gray-800 bg-white border-2 border-gray-300 rounded-lg focus:border-[#D4AF37] focus:ring-2 focus:ring-[#D4AF37]/20 transition-all placeholder-gray-400 faq-question"
                            placeholder="Enter your question...">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-600 mb-1.5">
                            <i class="fas fa-comment-dots text-[#D4AF37]"></i> Answer
                        </label>
                        <textarea 
                            name="{{ $name }}[{{ $index }}][answer]" 
                            rows="3"
                            class="w-full px-4 py-2.5 text-gray-800 bg-white border-2 border-gray-300 rounded-lg focus:border-[#D4AF37] focus:ring-2 focus:ring-[#D4AF37]/20 transition-all placeholder-gray-400 resize-none faq-answer"
                            placeholder="Enter your answer...">{{ $answer }}</textarea>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    
    <div class="mt-4">
        <button type="button" class="add-faq inline-flex items-center gap-2 px-4 py-2.5 bg-gray-100 text-gray-700 font-bold rounded-xl hover:bg-gray-200 transition-all">
            <i class="fas fa-plus-circle text-[#D4AF37]"></i>
            <span>Add FAQ Item</span>
        </button>
    </div>
    
    <p class="mt-3 text-sm text-gray-500 flex items-center gap-2">
        <i class="fas fa-info-circle text-[#D4AF37]"></i>
        <span>Add frequently asked questions to help your readers understand the topic better</span>
    </p>
</div>

@once
@push('scripts')
<script>
    function updateFaqNumbers(repeater) {
        const items = repeater.querySelectorAll('.faq-item');
        items.forEach((item, index) => {
            const numberBadge = item.querySelector('.bg-\\[\\#D4AF37\\]');
            const questionInput = item.querySelector('.faq-question');
            const answerInput = item.querySelector('.faq-answer');
            
            if (numberBadge) {
                numberBadge.textContent = index + 1;
            }
            if (questionInput) {
                questionInput.name = `${repeater.dataset.name}[${index}][question]`;
            }
            if (answerInput) {
                answerInput.name = `${repeater.dataset.name}[${index}][answer]`;
            }
        });
    }

    document.addEventListener('click', function(e) {
        if (e.target.closest('.add-faq')) {
            const repeater = e.target.closest('.faq-repeater');
            const itemsContainer = repeater.querySelector('.faq-items');
            const name = repeater.dataset.name;
            const currentIndex = itemsContainer.querySelectorAll('.faq-item').length;

            const newItem = document.createElement('div');
            newItem.className = 'faq-item group relative bg-gray-50 border-2 border-gray-200 rounded-xl p-5 hover:border-[#D4AF37]/50 transition-all';
            newItem.innerHTML = `
                <div class="absolute top-3 right-3 opacity-0 group-hover:opacity-100 transition-opacity">
                    <button type="button" class="remove-faq p-2 text-red-500 hover:bg-red-100 rounded-lg transition-colors" title="Remove FAQ">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
                <div class="flex items-center gap-2 mb-3">
                    <span class="flex items-center justify-center w-6 h-6 bg-[#D4AF37] text-black text-xs font-bold rounded-full">
                        ${currentIndex + 1}
                    </span>
                    <span class="text-sm font-bold text-gray-700">FAQ Item</span>
                </div>
                <div class="grid grid-cols-1 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-600 mb-1.5">
                            <i class="fas fa-question text-[#D4AF37]"></i> Question
                        </label>
                        <input type="text" 
                            name="${name}[${currentIndex}][question]" 
                            class="w-full px-4 py-2.5 text-gray-800 bg-white border-2 border-gray-300 rounded-lg focus:border-[#D4AF37] focus:ring-2 focus:ring-[#D4AF37]/20 transition-all placeholder-gray-400 faq-question"
                            placeholder="Enter your question...">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-600 mb-1.5">
                            <i class="fas fa-comment-dots text-[#D4AF37]"></i> Answer
                        </label>
                        <textarea 
                            name="${name}[${currentIndex}][answer]" 
                            rows="3"
                            class="w-full px-4 py-2.5 text-gray-800 bg-white border-2 border-gray-300 rounded-lg focus:border-[#D4AF37] focus:ring-2 focus:ring-[#D4AF37]/20 transition-all placeholder-gray-400 resize-none faq-answer"
                            placeholder="Enter your answer..."></textarea>
                    </div>
                </div>
            `;
            itemsContainer.appendChild(newItem);
            
            // Focus on the new question field
            const newQuestionInput = newItem.querySelector('.faq-question');
            if (newQuestionInput) {
                newQuestionInput.focus();
            }
        }

        if (e.target.closest('.remove-faq')) {
            const item = e.target.closest('.faq-item');
            const container = item.closest('.faq-items');
            if (container.querySelectorAll('.faq-item').length > 1) {
                item.remove();
                updateFaqNumbers(repeater);
            } else {
                // Clear the fields instead of removing the last item
                const questionInput = item.querySelector('.faq-question');
                const answerInput = item.querySelector('.faq-answer');
                if (questionInput) questionInput.value = '';
                if (answerInput) answerInput.value = '';
            }
        }
    });
</script>
@endpush
@endonce
