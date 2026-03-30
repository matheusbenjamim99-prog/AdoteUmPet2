<footer class="main-footer">
        <div class="footer-content">
            <div class="footer-section">
                <h4>Links Rápidos</h4>
                <ul>
                    <li><a href="{% url 'project' %}">Adote Agora</a></li>
                    <li><a href="{% url 'sponsorship' %}">Apadrinhe</a></li>
                    <li><a href="{% url 'contact' %}">FAQ e Contato</a></li>
                </ul>
            </div>

            <div class="footer-section social-icons">
                <h4>Siga-nos</h4>
                <a href="https://instagram.com/seuperfil" target="_blank" aria-label="Instagram"><i
                        class="fab fa-instagram"></i></a>
                <a href="https://facebook.com/seuperfil" target="_blank" aria-label="Facebook"><i
                        class="fab fa-facebook-f"></i></a>
                <a href="https://youtube.com/seuperfil" target="_blank" aria-label="YouTube"><i
                        class="fab fa-youtube"></i></a>
            </div>

            <div class="footer-section contact-info">
                <h4>Informações</h4>
                <p>contato@caminhodonossolar.com.br</p>
                <p>WhatsApp: (85) 99699-1515</p>
                <p>Fortaleza, Ceará</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>© 2025 Caminho do Nosso Lar – Todos os direitos reservados.</p>
            <a href="#top" class="back-to-top">Voltar ao topo</a>
            <form action="/logout/" method="post">
    <button type="submit">Logout</button>
</form>
        </div>
    </footer>
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Inicialização do AOS
            AOS.init({ duration: 1000, once: true });

            // Lógica do Dark Mode e Menu Hamburger (COMPLETA)
            const themeSwitch = document.querySelector('.theme-switch');
            const body = document.body;

            // Carrega tema salvo ou preferência do sistema
            const savedTheme = localStorage.getItem('theme') ||
                (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');

            if (savedTheme === 'light') {
                body.classList.add('light-mode');
                themeSwitch.textContent = '🌙';
            } else {
                themeSwitch.textContent = '🌞';
            }

            themeSwitch.addEventListener('click', function () {
                body.classList.toggle('light-mode');

                if (body.classList.contains('light-mode')) {
                    localStorage.setItem('theme', 'light');
                    this.textContent = '🌙';
                } else {
                    localStorage.setItem('theme', 'dark');
                    this.textContent = '🌞';
                }
            });

            // Lógica do Menu Hamburger e Destaque (Estrutura e Navegação)
            const hamburger = document.querySelector('.hamburger');
            const navUl = document.querySelector('nav ul');
            const navLinks = document.querySelectorAll('.nav-link');

            hamburger.addEventListener('click', function () {
                navUl.classList.toggle('open');
                this.textContent = navUl.classList.contains('open') ? '✕' : '☰';
            });

            const currentPath = window.location.pathname.split('/').pop() || 'index.html';

            navLinks.forEach(link => {
                const linkPath = link.getAttribute('href').split('/').pop();

                // Marca o link ativo
                if (linkPath === currentPath || (currentPath === '' && linkPath === 'index.html')) {
                    link.classList.add('active');
                }

                // Fecha o menu ao clicar (em dispositivos móveis)
                link.addEventListener('click', () => {
                    if (navUl.classList.contains('open')) {
                        navUl.classList.remove('open');
                        hamburger.textContent = '☰';
                    }
                });
            });
        });
    </script>
</body>

</html>