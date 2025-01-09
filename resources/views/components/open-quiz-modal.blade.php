<div x-data={ body: false } x-show="body" x-on:open-quiz-modal.window="body = $event.detail" class="fixed z-50 inset-0">
    <div class="fixed inset-0 bg-gray-900 opacity-90"></div>
    <div class="bg-white rounded m-auto fixed inset-0 max-w-2xl" style="max-height: 500px">
        Main Content
    </div>
</div>