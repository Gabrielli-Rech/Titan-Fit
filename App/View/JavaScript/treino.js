document.addEventListener("DOMContentLoaded", function () {
    const adicionarBtn = document.querySelector("#adicionar-treino");

    adicionarBtn.addEventListener("click", () => {
        const grupo = document.querySelector("#grupo-muscular").value;
        const nome = document.querySelector("#nome-exercicio").value.trim();
        const descricao = document.querySelector("#descricao-exercicio").value.trim();
        const dias = document.querySelector("#dias-semana")?.value.trim();
        const tempo = document.querySelector("#tempo-treino")?.value.trim();
        const data = document.querySelector("#data-criacao")?.value;

        if (!grupo || !nome || !descricao || (!dias || !tempo || !data)) {
            alert("Preencha todos os campos obrigatórios.");
            return;
        }

        const novoExercicio = document.createElement("div");
        novoExercicio.classList.add("exercicio");
        novoExercicio.style.border = "1px solid #ccc";
        novoExercicio.style.padding = "10px";
        novoExercicio.style.marginTop = "10px";
        novoExercicio.style.borderRadius = "8px";

        novoExercicio.innerHTML = `
            <h4>${nome}</h4>
            <p><strong>Descrição:</strong> ${descricao}</p>
            <p><strong>Dias da Semana:</strong> ${dias}</p>
            <p><strong>Tempo de Treino:</strong> ${tempo}</p>
            <p><strong>Data de Criação:</strong> ${data}</p>
        `;

        const grupoContainer = document.querySelector(`#grupo-${grupo}`);
        if (grupoContainer) {
            grupoContainer.appendChild(novoExercicio);
        } else {
            alert("Grupo muscular não encontrado.");
        }

        // Limpar campos
        document.querySelector("#nome-exercicio").value = '';
        document.querySelector("#descricao-exercicio").value = '';
        if (document.querySelector("#dias-semana")) document.querySelector("#dias-semana").value = '';
        if (document.querySelector("#tempo-treino")) document.querySelector("#tempo-treino").value = '';
        if (document.querySelector("#data-criacao")) document.querySelector("#data-criacao").value = '';
    });
});
