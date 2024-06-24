<script src="js/portalPesquisar.js"></script>
<script>
         function getGreeting() {
            const now = new Date();
            const hour = now.getHours();
            let greeting;

            if (hour < 12) {
                greeting = "Bom dia";
            } else if (hour < 18) {
                greeting = "Boa tarde";
            } else {
                greeting = "Boa noite";
            }

            return greeting;
        }

        function displayWelcomeMessage() {
            const userName = "<?php echo $no ?>";
            const greeting = getGreeting();
            const message = `${greeting}, ${userName}, bem-vindo(a) ao Portal TI`;
            document.getElementById("welcome-message").innerText = message;
        }

        window.onload = displayWelcomeMessage;

    </script>



<style>
  .linhaOp {
            padding: 10px;
            display: flex;
            justify-content: space-between;
            margin-bottom: -20px;
        }

        .item {
            
            margin: 10px;
        }

        .input-container {
            display: flex;
            align-items: center;
        }

        .form-control {
            margin-right: 10px; 
            border-radius: 9px;
            width: 280px;
        }

        .lupa{
        cursor: pointer;
        }

        .search-button {
            background: none;
            border: none;
            padding: 0;
            cursor: pointer;
            display: flex;
            align-items: center;
        }

        #resultados {
    position: fixed;
    top: 150px; 
    right: 60px; 
    background-color: #fff;
    color: black;       
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 9px;
    width: 280px; 
    max-height: 400px; 
    overflow-y: auto; 
    z-index: 999; 
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
  border-color: gray;
  border-bottom-width: 5px; /* Espessura da borda superior */
  border-bottom-color: #9932cc /* Cor da borda superior */
  }

  #welcome-message{
    color: gray;
  }
</style>

<body>
  <div class="linhaOp">
        <div class="item"><span id="welcome-message">Bem-vindo!</span></div>
        <div class="item input-container">
            <input type="text" class="form-control" id="pesquisar" placeholder="Pesquisar" name="pesquisar" required>
            <svg class="lupa"xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="gray" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
            </svg>
          
        </div>
    </div>

    <div id="resultados" style="display:none"></div>
</body>
