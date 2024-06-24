//Desenvolvido por Felipe Rudek Schner - 19-06-2024

document.addEventListener('DOMContentLoaded', (event) => {
    let dados = [];
    const divResultados = document.getElementById('resultados');
    const campoPesquisar = document.getElementById('pesquisar');
  
    // Método para puxar dados
    function puxarDadosRemotos() {
        fetch('https://localti.local.com.br/api_pesquisar')
            .then(response => response.json())
            .then(json => {
                dados = json;
                console.log(dados);
            })
            .catch(error => console.error('Erro ao puxar dados:', error));
    }
  
    // Função para exibir os resultados
    function exibirResultados(resultados) {
        divResultados.innerHTML = '';
  
        if (resultados.length === 0) {
            divResultados.innerHTML = '<p>Nenhum resultado encontrado</p>';
            return;
        }
  
        const ul = document.createElement('ul');
        resultados.forEach(item => {
            const li = document.createElement('li');
            const a = document.createElement('a');
  
            // Verificação do nível e do link
            if (item.nivel === 'nivel2') {
                if (item.link && item.link.trim() !== '') {
                    a.href = item.link;
                    a.textContent = item.tipo + ' - Menu';
                } else {
                    a.href = 'nivel3?id=' + item.id;
                    a.textContent = item.tipo + ' - Menu';
                }
            } else {
                if (item.link && item.link.trim() !== '') {
                    a.href = item.link;
                    a.textContent = item.tipo + ' - Painel';
                } else {
                    a.href = 'grafico?id=' + item.id;
                    a.textContent = item.tipo + ' - Painel';
                }
            }
            
           
            a.target = '_blank'; // Abre o link em uma nova aba
            li.appendChild(a);
            ul.appendChild(li);
        });
        divResultados.appendChild(ul);
        divResultados.style.display = 'block'; 
    }
  
    // Evento de escuta no campo de pesquisa
    campoPesquisar.addEventListener('input', function() {
        const query = this.value.toLowerCase();
        const resultadosFiltrados = dados.filter(item => {
            if (typeof item.tipo === 'string') {
                return item.tipo.toLowerCase().includes(query);
            }
            return false;
        });
        exibirResultados(resultadosFiltrados);
    });
  
    // Evento para ocultar resultados ao clicar fora
    document.addEventListener('click', function(event) {
        const clicadoFora = !divResultados.contains(event.target) && event.target !== campoPesquisar;
        if (clicadoFora) {
            divResultados.style.display = 'none'; 
        }
    });
  
    // Inicialização
    puxarDadosRemotos();
  });
  
