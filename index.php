<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCB  Assistant Digital & Espace Client</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --scb-yellow: #F4B41A;
            --scb-orange: #E65A4B;
            --scb-black: #1A1A1A;
            --scb-gray: #f4f7f6;
            --scb-white: #ffffff;
        }

        body { font-family: 'Poppins', sans-serif; background-color: var(--scb-gray); color: var(--scb-black); min-height: 100vh; display: flex; flex-direction: column; }
        
        /* NAVBAR */
        .navbar-scb { background-color: var(--scb-black); border-bottom: 4px solid var(--scb-orange); }
        .navbar-brand img { height: 45px; }
        .nav-link { color: #fff !important; font-weight: 500; margin-left: 15px; transition: 0.3s; cursor: pointer; }
        .nav-link:hover, .nav-link.active { color: var(--scb-yellow) !important; }

        /* HERO */
        .hero-section { 
            background: linear-gradient(135deg, rgba(26,26,26,0.9) 0%, rgba(230,90,75,0.8) 100%), 
                        url('https://images.unsplash.com/photo-1556742044-3c52d6e88c62?q=80&w=1000') no-repeat center center;
            background-size: cover; color: white; padding: 60px 0; text-align: center;
        }

        /* CARDS ACCUEIL */
        .card-service { transition: all 0.3s ease; cursor: pointer; border: none; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.08); background: #fff; height: 100%; }
        .card-service:hover { transform: translateY(-10px); background-color: var(--scb-black); color: white; }
        .icon-box i { color: var(--scb-orange); transition: 0.3s; }
        .card-service:hover .icon-box i { color: var(--scb-yellow); }

        /* ESPACE CONNEXION / INSCRIPTION */
        .auth-card { border: none; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); overflow: hidden; background: white; }
        .auth-tabs .nav-link { color: var(--scb-black) !important; border: none; border-bottom: 3px solid transparent; border-radius: 0; padding: 15px; font-weight: 600; flex: 1; text-align: center; margin-left: 0; }
        .auth-tabs .nav-link.active { background: none; border-bottom-color: var(--scb-orange); color: var(--scb-orange) !important; }
        .form-control { background-color: #f8f9fa; border: 1px solid #eee; padding: 12px; border-radius: 10px; }
        .form-control:focus { border-color: var(--scb-yellow); box-shadow: none; background-color: #fff; }
        .btn-auth { background: var(--scb-black); color: white; border-radius: 10px; padding: 12px; font-weight: 600; transition: 0.3s; border: none; }
        .btn-auth:hover { background: var(--scb-orange); color: white; }

        /* AGENCES */
        .accordion-item { border: none; margin-bottom: 10px; border-radius: 12px !important; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.05); }
        .agency-card { background: #fff; border: 1px solid #eee; border-radius: 10px; padding: 12px; transition: 0.3s; height: 100%; display: flex; align-items: center; }
        .agency-card:hover { border-color: var(--scb-yellow); }
        .agency-icon { width: 40px; height: 40px; background: var(--scb-gray); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 12px; color: var(--scb-orange); }

        /* CHAT */
        .chat-box { height: 350px; overflow-y: auto; background: #f9f9f9; border-radius: 10px; padding: 15px; border: 1px solid #eee; display: flex; flex-direction: column; }
        .msg { padding: 10px 15px; border-radius: 10px; margin-bottom: 10px; max-width: 80%; font-size: 0.9rem; }
        .msg-bot { background-color: #e9ecef; align-self: flex-start; }
        .msg-user { background-color: var(--scb-orange); color: white; align-self: flex-end; }

        /* ANIMATIONS */
        .page-content { display: none; }
        .active-page { display: block; animation: fadeIn 0.4s; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }

        footer { background-color: var(--scb-black); color: white; padding: 30px 0; border-top: 5px solid var(--scb-yellow); margin-top: auto; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-scb sticky-top shadow">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="#" onclick="showPage('home')">
            <img src="Logo_SCB_Cameroun.png" alt="Logo">
            <span class="ms-2 fw-bold d-none d-sm-inline">ASSISTANT application</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#scbNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="scbNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active" href="#" onclick="showPage('home')"><i class="fas fa-home me-1"></i> Accueil</a></li>
                <li class="nav-item"><a class="nav-link" href="#" onclick="showPage('login')"><i class="fas fa-user-circle me-1"></i> Espace Client</a></li>
                <li class="nav-item"><a class="nav-link" href="#" onclick="showPage('accounts')"><i class="fas fa-wallet me-1"></i> Comptes</a></li>
                <li class="nav-item"><a class="nav-link" href="#" onclick="showPage('chat')"><i class="fas fa-headset me-1"></i> Assistance</a></li>
                <li class="nav-item"><a class="nav-link" href="#" onclick="showPage('agences')"><i class="fas fa-map-marker-alt me-1"></i> Branches</a></li>
                <li class="nav-item"><a class="nav-link" href="#" onclick="showPage('urgences')"><i class="fas fa-exclamation-triangle me-1"></i> Urgences</a></li>
            </ul>
        </div>
    </div>
</nav>

<div id="home" class="page-content active-page">
    <section class="hero-section">
        <div class="container">
            <h1 class="fw-bold display-5">Partenaire</h1>
            <p class="lead">Simplifiez votre quotidien avec les services digitaux de la SCB Cameroun.</p>
            <button class="btn btn-warning btn-lg rounded-pill fw-bold mt-3 px-5 shadow" onclick="showPage('login')">Mon Espace <i class="fas fa-chevron-right ms-2"></i></button>
        </div>
    </section>
    <div class="container my-5">
        <div class="row g-4 text-center">
            <div class="col-6 col-md-3"><div class="card card-service p-4" onclick="showPage('accounts')"><div class="icon-box mb-3"><i class="fas fa-coins fa-2x"></i></div><h6 class="fw-bold">SOLDE</h6></div></div>
            <div class="col-6 col-md-3"><div class="card card-service p-4" onclick="showPage('chat')"><div class="icon-box mb-3"><i class="fas fa-robot fa-2x"></i></div><h6 class="fw-bold">CHAT IA</h6></div></div>
            <div class="col-6 col-md-3"><div class="card card-service p-4" onclick="showPage('agences')"><div class="icon-box mb-3"><i class="fas fa-search-location fa-2x"></i></div><h6 class="fw-bold">AGENCES</h6></div></div>
            <div class="col-6 col-md-3"><div class="card card-service p-4" onclick="showPage('urgences')"><div class="icon-box mb-3"><i class="fas fa-lock fa-2x"></i></div><h6 class="fw-bold">SECURITÉ</h6></div></div>
        </div>
    </div>
</div>

<div id="login" class="page-content container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-8">
            <div class="auth-card">
                <nav class="nav auth-tabs border-bottom">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab-login">CONNEXION</button>
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-register">CRÉER UN COMPTE</button>
                </nav>

                <div class="tab-content p-4">
                    <div class="tab-pane fade show active" id="tab-login">
                        <div class="text-center mb-4">
                            <h5 class="fw-bold">Ravi de vous revoir !</h5>
                            <p class="text-muted small">Veuillez entrer vos identifiants SCB.</p>
                        </div>
                        <form onsubmit="event.preventDefault(); alert('Connexion réussie !'); showPage('accounts');">
                            <div class="mb-3">
                                <label class="small fw-bold mb-1">Identifiant Client</label>
                                <input type="text" class="form-control" placeholder="Numéro de compte" required>
                            </div>
                            <div class="mb-4">
                                <label class="small fw-bold mb-1">Code Secret</label>
                                <input type="password" class="form-control" placeholder="••••••••" required>
                            </div>
                            <button type="submit" class="btn btn-auth w-100">ACCÉDER À MON COMPTE</button>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="tab-register">
                        <div class="text-center mb-4">
                            <h5 class="fw-bold">Devenir Client Digital</h5>
                            <p class="text-muted small">Enregistrez-vous en quelques secondes.</p>
                        </div>
                        <form onsubmit="event.preventDefault(); alert('Compte créé avec succès !'); showPage('home');">
                            <div class="mb-3">
                                <label class="small fw-bold mb-1">Nom complet</label>
                                <input type="text" class="form-control" placeholder="Nom et Prénom" required>
                            </div>
                            <div class="mb-3">
                                <label class="small fw-bold mb-1">Numéro de téléphone</label>
                                <input type="tel" class="form-control" placeholder="+237 ..." required>
                            </div>
                            <div class="mb-4">
                                <label class="small fw-bold mb-1">Créer un code secret</label>
                                <input type="password" class="form-control" placeholder="6 chiffres" required>
                            </div>
                            <button type="submit" class="btn btn-auth w-100" style="background: var(--scb-orange);">CRÉER MON ACCÈS</button>
                        </form>
                    </div>
                </div>
            </div>
            <p class="text-center mt-4 small text-muted"><i class="fas fa-shield-alt me-1"></i> Connexion sécurisée par cryptage 256 bits</p>
        </div>
    </div>
</div>

<div id="accounts" class="page-content container my-5">
    <h2 class="fw-bold mb-4 border-start border-5 border-warning ps-3">Ma Situation Bancaire</h2>
    <div class="table-responsive bg-white p-4 shadow-sm rounded-3">
        <table class="table table-hover align-middle">
            <thead class="table-dark"><tr><th>Type de Compte</th><th>Numéro</th><th>Solde Disponible</th></tr></thead>
            <tbody>
                <tr><td class="fw-bold">Compte Chèque Courant</td><td class="text-muted">10001-00XXX</td><td class="fw-bold text-danger">1 450 000 FCFA</td></tr>
                <tr><td class="fw-bold">Épargne Wafa Classique</td><td class="text-muted">10001-00YYY</td><td class="fw-bold text-danger">5 200 000 FCFA</td></tr>
            </tbody>
        </table>
    </div>
</div>

<div id="agences" class="page-content container my-5">
    <h2 class="fw-bold mb-4">Points de Service SCB</h2>
    <div class="accordion shadow-sm" id="accAgences">
        <div class="accordion-item">
            <h2 class="accordion-header"><button class="accordion-button fw-bold" data-bs-toggle="collapse" data-bs-target="#collLittoral">LITTORAL / DOUALA & EDEA</button></h2>
            <div id="collLittoral" class="accordion-collapse collapse show" data-bs-parent="#accAgences">
                <div class="accordion-body bg-light"><div class="row g-2">
                    <div class="col-md-4"><div class="agency-card"><div class="agency-icon"><i class="fas fa-building"></i></div><span class="small fw-bold">BONAPRISO</span></div></div>
                    <div class="col-md-4"><div class="agency-card"><div class="agency-icon"><i class="fas fa-university"></i></div><span class="small fw-bold">BONANJO</span></div></div>
                    <div class="col-md-4"><div class="agency-card"><div class="agency-icon"><i class="fas fa-bus"></i></div><span class="small fw-bold">BONABÉRI</span></div></div>
                    <div class="col-md-4"><div class="agency-card"><div class="agency-icon"><i class="fas fa-home"></i></div><span class="small fw-bold">BONAMOUSSADI</span></div></div>
                    <div class="col-md-4"><div class="agency-card shadow-sm"><div class="agency-icon"><i class="fas fa-star text-warning"></i></div><span class="small fw-bold text-orange">BANQUE PLATINE</span></div></div>
                </div></div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header"><button class="accordion-button collapsed fw-bold" data-bs-toggle="collapse" data-bs-target="#collCentre">CENTRE / YAOUNDÉ</button></h2>
            <div id="collCentre" class="accordion-collapse collapse" data-bs-parent="#accAgences">
                <div class="accordion-body bg-light"><div class="row g-2">
                    <div class="col-md-6"><div class="agency-card"><div class="agency-icon"><i class="fas fa-landmark"></i></div><span class="small fw-bold">AGENCE PRINCIPALE YAOUNDÉ</span></div></div>
                    <div class="col-md-6"><div class="agency-card"><div class="agency-icon"><i class="fas fa-home"></i></div><span class="small fw-bold">BASTOS / TSINGA / MVOG-MBI</span></div></div>
                </div></div>
            </div>
        </div>
    </div>
</div>

<div id="chat" class="page-content container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow border-0 overflow-hidden" style="border-radius: 15px;">
                <div class="card-header bg-black text-white fw-bold p-3">Assistant Virtuel SCB</div>
                <div class="card-body">
                    <div id="chat-window" class="chat-box mb-3">
                        <div class="msg msg-bot">Bonjour ! Je suis là pour vous aider avec vos comptes ou nos agences. Que puis-je faire pour vous ?</div>
                    </div>
                    <div class="input-group shadow-sm border rounded">
                        <input type="text" id="chat-input" class="form-control border-0" placeholder="Tapez ici...">
                        <button class="btn btn-warning" id="send-chat"><i class="fas fa-paper-plane"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="urgences" class="page-content container my-5 text-center">
    <div class="alert alert-danger p-5 shadow-lg rounded-4 border-0">
        <i class="fas fa-phone-alt fa-4x mb-3"></i>
        <h2 class="fw-bold text-uppercase">Opposition et Carte Bancaire</h2>
        <p class="display-5 fw-bold mb-0">+237 233 43 00 00</p>
        <p class="mt-3 opacity-75">Signalez immédiatement la perte ou le vol de vos moyens de paiement.</p>
    </div>
</div>

<footer class="text-center mt-auto">
    <div class="container">
        <img src="Logo_SCB_Cameroun.png" alt="SCB" height="40" class="mb-3">
        <p class="small mb-1 fw-bold">SCB CAMEROUN - Groupe Attijariwafa Bank</p>
        <p class="small opacity-50 mb-0">© 2024 Tous droits réservés.</p>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function showPage(id) {
        $('.page-content').removeClass('active-page');
        $('.nav-link').removeClass('active');
        $('#' + id).addClass('active-page');
        $(`a[onclick="showPage('${id}')"]`).addClass('active');
        
        // Fermer le menu mobile si ouvert
        if($('.navbar-toggler').is(':visible')) {
            $('.navbar-collapse').collapse('hide');
        }
        
        // Remonter en haut de page
        window.scrollTo(0, 0);
    }

    $('#send-chat').click(function() {
        let val = $('#chat-input').val();
        if(val) {
            $('#chat-window').append(`<div class="msg msg-user">${val}</div>`);
            $('#chat-input').val('');
            setTimeout(() => {
                let reply = "Nos équipes traitent votre demande concernant : " + val;
                if(val.toLowerCase().includes('solde')) reply = "Vous pouvez consulter vos soldes dans l'onglet 'Comptes' après connexion.";
                $('#chat-window').append(`<div class="msg msg-bot">${reply}</div>`);
                $('#chat-window').scrollTop($('#chat-window')[0].scrollHeight);
            }, 800);
        }
    });

    // Envoi par touche Entrée
    $('#chat-input').keypress(function(e) {
        if(e.which == 13) $('#send-chat').click();
    });
</script>
</body>
</html>
