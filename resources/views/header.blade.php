</head>
<body>
    <header>
        
        <nav>
            <h1> La petite Caverne</h1>
            <ul>
                <li><a href="/">Accueil</a></li> <!-- mettre la route au lieu du # -->
                <li><a href="/contact">Contactez-nous</a></li>
                <li><a href="/message">Messages</a></li>
            </ul>
            <div class="search-bar">
                <form action="/search" method="GET"> <!-- GET car lire une info sans la modifier-->
                    <input type="text" name="query" placeholder="Rechercher un livre" required>
                    <button type="submit">Rechercher</button>
                </form>
            </div>
        </nav>
    </header>


    