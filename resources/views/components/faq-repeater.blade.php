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
                $id = 'faq_answer_' . $name . '_' . $index;
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
                            id="{{ $id }}"
                            name="{{ $name }}[{{ $index }}][answer]" 
                            rows="3"
                            class="faq-editor w-full px-4 py-2.5 text-gray-800 bg-white border-2 border-gray-300 rounded-lg focus:border-[#D4AF37] focus:ring-2 focus:ring-[#D4AF37]/20 transition-all placeholder-gray-400 faq-answer"
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
    function initFaqEditors() {
        if (typeof CKEDITOR === 'undefined') return;
        
        document.querySelectorAll('.faq-editor').forEach(textarea => {
            if (!CKEDITOR.instances[textarea.id]) {
                CKEDITOR.replace(textarea.id, {
                    height: 200,
                    removeButtons: 'Image,Flash,Iframe,About',
                    toolbarGroups: [
                        { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                        { name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
                        { name: 'links' },
                        { name: 'styles' },
                        { name: 'colors' },
                        { name: 'tools' },
                    ]
                });
            }
        });
    }

    function destroyFaqEditor(textarea) {
        if (typeof CKEDITOR !== 'undefined' && CKEDITOR.instances[textarea.id]) {
            CKEDITOR.instances[textarea.id].destroy();
        }
    }

    document.addEventListener('DOMContentLoaded', initFaqEditors);

    function updateFaqNumbers(repeater) {
        const items = repeater.querySelectorAll('.faq-item');
        const name = repeater.dataset.name;
        
        items.forEach((item, index) => {
            const numberBadge = item.querySelector('.bg-\\[\\#D4AF37\\]');
            const questionInput = item.querySelector('.faq-question');
            const textarea = item.querySelector('.faq-editor');
            
            if (numberBadge) {
                numberBadge.textContent = index + 1;
            }
            if (questionInput) {
                questionInput.name = `${name}[${index}][question]`;
            }
            if (textarea) {
                const oldId = textarea.id;
                const newId = `faq_answer_${name}_${index}`;
                
                if (oldId !== newId) {
                    if (typeof CKEDITOR !== 'undefined' && CKEDITOR.instances[oldId]) {
                        const data = CKEDITOR.instances[oldId].getData();
                        CKEDITOR.instances[oldId].destroy();
                        textarea.id = newId;
                        textarea.name = `${name}[${index}][answer]`;
                        CKEDITOR.replace(newId, {
                            height: 200,
                            removeButtons: 'Image,Flash,Iframe,About'
                        }).setData(data);
                    } else {
                        textarea.id = newId;
                        textarea.name = `${name}[${index}][answer]`;
                    }
                }
            }
        });
    }

    document.addEventListener('click', function(e) {
        const addBtn = e.target.closest('.add-faq');
        if (addBtn) {
            const repeater = addBtn.closest('.faq-repeater');
            const itemsContainer = repeater.querySelector('.faq-items');
            const name = repeater.dataset.name;
            const currentIndex = itemsContainer.querySelectorAll('.faq-item').length;
            const newId = `faq_answer_${name}_${currentIndex}`;

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
                            id="${newId}"
                            name="${name}[${currentIndex}][answer]" 
                            rows="3"
                            class="faq-editor w-full px-4 py-2.5 text-gray-800 bg-white border-2 border-gray-300 rounded-lg focus:border-[#D4AF37] focus:ring-2 focus:ring-[#D4AF37]/20 transition-all placeholder-gray-400 faq-answer"
                            placeholder="Enter your answer..."></textarea>
                    </div>
                </div>
            `;
            itemsContainer.appendChild(newItem);
            
            if (typeof CKEDITOR !== 'undefined') {
                CKEDITOR.replace(newId, {
                    height: 200,
                    removeButtons: 'Image,Flash,Iframe,About'
                });
            }
        }

        const removeBtn = e.target.closest('.remove-faq');
        if (removeBtn) {
            const item = removeBtn.closest('.faq-item');
            const repeater = item.closest('.faq-repeater');
            const container = item.closest('.faq-items');
            const textarea = item.querySelector('.faq-editor');
            
            if (container.querySelectorAll('.faq-item').length > 1) {
                if (textarea && typeof CKEDITOR !== 'undefined' && CKEDITOR.instances[textarea.id]) {
                    CKEDITOR.instances[textarea.id].destroy();
                }
                item.remove();
                updateFaqNumbers(repeater);
            } else {
                const questionInput = item.querySelector('.faq-question');
                if (questionInput) questionInput.value = '';
                if (textarea && typeof CKEDITOR !== 'undefined' && CKEDITOR.instances[textarea.id]) {
                    CKEDITOR.instances[textarea.id].setData('');
                }
            }
        }
    });
</script>
@endpush
@endonce
