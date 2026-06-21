<script>
    document.addEventListener('DOMContentLoaded', function() {
        const hamburger = document.getElementById('hamburgerMenu');
        const sidebar = document.getElementById('adminSidebar');
        const closeBtn = document.getElementById('closeSidebarBtn');

        if (hamburger) {
            hamburger.addEventListener('click', function() {
                sidebar.classList.add('active');
            });
        }

        if (closeBtn) {
            closeBtn.addEventListener('click', function() {
                sidebar.classList.remove('active');
            });
        }
    });
</script>
</div> <!-- End main-content -->
</body>
</html>
