<style>
    /* Floating WhatsApp Button */
    #whatsapp-button {
        position: fixed;
        bottom: 20px;
        right: 20px;
        background-color: #25d366;
        border-radius: 50%;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        width: 60px;
        height: 60px;
        display: flex;
        justify-content: center;
        align-items: center;
        text-decoration: none;
        z-index: 9999;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        animation: floating 2s ease-in-out infinite;
    }

    #whatsapp-button:hover {
        transform: scale(1.1);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
    }

    #whatsapp-button img {
        width: 35px;
        height: 35px;
    }

    @keyframes floating {
        0% { transform: translateY(0); }
        50% { transform: translateY(-8px); }
        100% { transform: translateY(0); }
    }
</style>
