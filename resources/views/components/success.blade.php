<div x-data="{ msg: null, success: false, error: false }" x-cloak x-show="msg" x-on:success.window="
        msg = $event.detail;
        if(msg == 'success') {
            success = true;
        } else {
            error = true;
        }
        setTimeout(() => {
            msg = null;
            success = false;
            error = false;
        }, 2000)
    " class="absolute top-1/2 right-1/2 z-10 p-3 m-3 rounded-lg"
    :class="msg == 'success' ? 'bg-green-500 border border-green-600' : 'bg-red-500 border border-red-600'">
    <span x-show="success">Comment has been created successfully!</span>
    <span x-show="error">Error creating a comment!</span>
</div>