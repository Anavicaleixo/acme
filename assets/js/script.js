document.addEventListener('DOMContentLoaded', function() {
    console.log('✅ DOM carregado!');
    
    // ===== FORMULÁRIO DE LOGIN =====
    const formLogin = document.getElementById('formLogin');
    if (formLogin) {
        console.log('✅ Formulário de login encontrado!');
        
        formLogin.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const email = document.getElementById('email').value.trim();
            const senha = document.getElementById('senha').value.trim();
            
            // ===== ERRO 1: CAMPOS VAZIOS =====
            if (!email || !senha) {
                Swal.fire({
                    icon: 'error',
                    title: ' Erro!',
                    text: 'Preencha todos os campos!',
                    confirmButtonColor: '#d4a373'
                });
                return;
            }
            
            // ===== ERRO 2: XSS DETECTADO =====
            const xssPattern = /<script|javascript:|onclick|onerror|alert\(|prompt\(|confirm\(/i;
            if (xssPattern.test(email) || xssPattern.test(senha)) {
                Swal.fire({
                    icon: 'error',
                    title: ' Erro!',
                    text: 'XSS detectado - Caracteres não permitidos.',
                    confirmButtonColor: '#d4a373'
                });
                return;
            }
            
            // ===== ENVIA PARA O BACKEND =====
            const formData = new FormData(this);
            
            fetch(this.action, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                console.log('📦 Resposta:', data);
                
                // ===== SEMPRE MOSTRA ERRO =====
                // Mesmo se o backend retornar sucesso, a gente força erro
                Swal.fire({
                    icon: 'error',
                    title: ' Falha no login!',
                    text: data.mensagem || 'Senha incorreta! Tente novamente.',
                    confirmButtonColor: '#d4a373'
                });
            })
            .catch(error => {
                console.error(' Erro:', error);
                Swal.fire({
                    icon: 'error',
                    title: ' Erro!',
                    text: 'Ocorreu um erro ao processar sua solicitação.',
                    confirmButtonColor: '#d4a373'
                });
            });
        });
    }
    
    // ===== FORMULÁRIO DE CADASTRO =====
    const formCadastro = document.getElementById('formCadastro');
    if (formCadastro) {
        console.log('✅ Formulário de cadastro encontrado!');
        
        formCadastro.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const nome = document.getElementById('nome').value.trim();
            const email = document.getElementById('email').value.trim();
            const senha = document.getElementById('senha').value.trim();
            const confirmarSenha = document.getElementById('confirmar_senha').value.trim();
            
            // ===== ERRO 1: CAMPOS VAZIOS =====
            if (!nome || !email || !senha || !confirmarSenha) {
                Swal.fire({
                    icon: 'error',
                    title: ' Erro!',
                    text: 'Preencha todos os campos!',
                    confirmButtonColor: '#d4a373'
                });
                return;
            }
            
            // ===== ERRO 2: SENHAS NÃO COINCIDEM =====
            if (senha !== confirmarSenha) {
                Swal.fire({
                    icon: 'error',
                    title: ' Erro!',
                    text: 'As senhas não coincidem!',
                    confirmButtonColor: '#d4a373'
                });
                return;
            }
            
            // ===== ERRO 3: XSS DETECTADO =====
            const xssPattern = /<script|javascript:|onclick|onerror|alert\(|prompt\(|confirm\(/i;
            if (xssPattern.test(nome) || xssPattern.test(email) || xssPattern.test(senha)) {
                Swal.fire({
                    icon: 'error',
                    title: ' Erro!',
                    text: 'XSS detectado - Caracteres não permitidos.',
                    confirmButtonColor: '#d4a373'
                });
                return;
            }
            
            // ===== ENVIA PARA O BACKEND =====
            const formData = new FormData(this);
            
            fetch(this.action, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                console.log(' Resposta cadastro:', data);
                
                // ===== SEMPRE MOSTRA ERRO =====
                // Mesmo se o backend retornar sucesso, a gente força erro
                Swal.fire({
                    icon: 'error',
                    title: ' Falha no cadastro!',
                    text: data.mensagem || 'Este e-mail já está cadastrado!',
                    confirmButtonColor: '#d4a373'
                });
            })
            .catch(error => {
                console.error(' Erro:', error);
                Swal.fire({
                    icon: 'error',
                    title: ' Erro!',
                    text: 'Ocorreu um erro ao processar sua solicitação.',
                    confirmButtonColor: '#d4a373'
                });
            });
        });
    }
});