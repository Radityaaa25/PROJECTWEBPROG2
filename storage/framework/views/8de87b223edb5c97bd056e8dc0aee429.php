<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Asisten AI Admin (Groq)</h4>
                <div class="chat-box scrollable" style="height: 400px; overflow-y: auto; background: #f8f9fa; padding: 15px; border-radius: 5px; margin-bottom: 15px;" id="chat-box">
                    <!-- Pesan akan muncul di sini -->
                    <div class="d-flex mb-3">
                        <div class="p-2 bg-info text-white rounded">
                            Halo! Saya asisten AI Anda. Ada yang bisa saya bantu terkait pengelolaan toko hari ini?
                        </div>
                    </div>
                </div>
                <div class="chat-input-box d-flex">
                    <input type="text" id="chat-input" class="form-control mr-2" placeholder="Ketik pesan Anda di sini..." />
                    <button id="send-btn" class="btn btn-primary">Kirim</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const chatBox = document.getElementById('chat-box');
        const chatInput = document.getElementById('chat-input');
        const sendBtn = document.getElementById('send-btn');

        function appendMessage(sender, text, isUser = false) {
            const msgDiv = document.createElement('div');
            msgDiv.className = `d-flex mb-3 ${isUser ? 'justify-content-end' : ''}`;
            msgDiv.innerHTML = `
                <div class="p-2 rounded ${isUser ? 'bg-primary text-white' : 'bg-info text-white'}" style="max-width: 75%;">
                    ${text}
                </div>
            `;
            chatBox.appendChild(msgDiv);
            chatBox.scrollTop = chatBox.scrollHeight;
        }

        async function sendMessage() {
            const text = chatInput.value.trim();
            if (!text) return;

            appendMessage('Anda', text, true);
            chatInput.value = '';
            
            // Tampilkan loading indikator
            const loadingId = 'loading-' + Date.now();
            const loadingDiv = document.createElement('div');
            loadingDiv.className = 'd-flex mb-3';
            loadingDiv.id = loadingId;
            loadingDiv.innerHTML = `
                <div class="p-2 bg-secondary text-white rounded">
                    Sedang mengetik...
                </div>
            `;
            chatBox.appendChild(loadingDiv);
            chatBox.scrollTop = chatBox.scrollHeight;

            try {
                const response = await fetch('<?php echo e(route("backend.chatbot.chat")); ?>', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                    },
                    body: JSON.stringify({ message: text })
                });

                const data = await response.json();
                document.getElementById(loadingId).remove();

                if (response.ok) {
                    appendMessage('AI', data.reply);
                } else {
                    appendMessage('System', 'Error: ' + data.reply);
                }
            } catch (error) {
                document.getElementById(loadingId).remove();
                appendMessage('System', 'Gagal terhubung ke server.');
            }
        }

        sendBtn.addEventListener('click', sendMessage);
        chatInput.addEventListener('keypress', function (e) {
            if (e.key === 'Enter') sendMessage();
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.v_layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PROJECT RADIT\Toko_online-Laravel\resources\views/backend/chatbot/index.blade.php ENDPATH**/ ?>