<footer>
    <p>&copy; <?php echo date("Y"); ?> WebTech App. All rights reserved.</p>
    <div class="social-icons">
        <a href="#" target="_blank"><i class="fab fa-linkedin"></i></a>
        <a href="#" target="_blank"><i class="fab fa-github"></i></a>
        <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
        <a href="#" target="_blank"><i class="fab fa-facebook"></i></a>
    </div>
</footer>
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>

<style>
    footer {
        background: linear-gradient(110deg, #0f0c29, #343063, #24243e);
        color: white;
        text-align: center;
        padding: 15px 0;
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
    }

    .social-icons {
        margin-top: 10px;
    }

    .social-icons a {
        color: white;
        font-size: 24px;
        margin: 0 10px;
        text-decoration: none;
        transition: 0.3s ease;
    }

    .social-icons a:hover {
        color: #1da1f2;
    }
</style>
