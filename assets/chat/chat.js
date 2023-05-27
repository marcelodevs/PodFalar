/* CHAT */

const listRes = document.querySelector(".msg-text-bot");
const userRes = document.querySelector(".msg-text-user");
const btnEnviar = document.querySelector(".enviar");
const inputPergunta = document.querySelector(".msg-pergunta");
const sugestion = document.querySelectorAll("#suggestion tbody td");

const tabela = {
    respostasDepoi: [
        "Para deixar seu depoimento, você pode apertar o botão de sair, que aparecerá um alerta perguntando se você quer deixar ou não seu depoimento. Espero ter ajudado(a)!"
    ],
    respostaSugestoes: [
        "A educação sexual é um processo de ensino e aprendizagem que aborda diversos aspectos relacionados à sexualidade humana. Ela tem como objetivo fornecer informações precisas, corretas e adequadas sobre os diferentes aspectos da sexualidade, promovendo o desenvolvimento saudável e responsável da sexualidade em indivíduos de todas as idades.",
        "A educação sexual é importante por diversos motivos. Aqui estão alguns dos principais:",
        "1. Informação precisa: A educação sexual fornece informações precisas e atualizadas sobre anatomia, fisiologia, reprodução, métodos contraceptivos, prevenção de DSTs e outros aspectos da sexualidade.Isso ajuda a combater mitos e informações errôneas que podem levar a comportamentos de risco, gravidez indesejada e disseminação de doenças.",
        "2. Saúde sexual: A educação sexual capacita as pessoas a cuidarem de sua saúde sexual de forma responsável.Ela promove o conhecimento sobre práticas seguras, uso adequado de contraceptivos e prevenção de doenças, contribuindo para a redução de gravidezes não planejadas, abortos inseguros e infecções transmitidas sexualmente.",
        "3. Relacionamentos saudáveis: A educação sexual ensina sobre relacionamentos saudáveis, consentimento, comunicação efetiva e respeito mútuo.Isso ajuda os indivíduos a desenvolverem habilidades para estabelecer relacionamentos positivos, reconhecer relacionamentos abusivos e tomar decisões informadas sobre sua vida afetiva e sexual.",
        "4. Diversidade e inclusão: A educação sexual aborda a diversidade de orientações sexuais, identidades de gênero e expressões de gênero.Isso promove a aceitação, o respeito e a compreensão das diferenças individuais, combatendo a discriminação e o preconceito.",
        "5. Autonomia e empoderamento: A educação sexual capacita as pessoas a tomarem decisões conscientes e informadas sobre sua sexualidade, corpo e relacionamentos.Ela promove a autonomia, a autoestima e o empoderamento, permitindo que os indivíduos assumam o controle de sua vida sexual e tomem decisões que estejam alinhadas com seus valores e desejos pessoais.",
        "6. Prevenção de abusos e exploração: A educação sexual pode ajudar a prevenir abusos sexuais, ao ensinar sobre limites, consentimento, reconhecimento de situações abusivas e como buscar ajuda em casos de violência sexual.Isso é fundamental para a proteção e segurança dos indivíduos, especialmente crianças e adolescentes.",
        "7. Redução de estigmas e tabus: A educação sexual contribui para a quebra de estigmas e tabus relacionados à sexualidade.Ela promove uma visão mais aberta e positiva sobre a sexualidade humana, combatendo a vergonha, o medo e a desinformação.",
        "Em resumo, a educação sexual é importante porque capacita as pessoas com conhecimentos, habilidades e atitudes necessárias para viverem uma vida sexual saudável, responsável e plena, promovendo o bem - estar individual e social."
    ],
    respostaSugestoesAbout: [
        "A educação sexual aborda uma variedade de tópicos relacionados à sexualidade humana.\n Aqui estão alguns dos principais tópicos comumente abordados na educação sexual: \n",
        "1) Anatomia e fisiologia sexual: A educação sexual inclui informações sobre os órgãos sexuais, tanto masculinos quanto femininos, e como eles funcionam no contexto da reprodução e do prazer sexual. \n",
        "2) Reprodução: Esse tópico abrange o processo de reprodução humana, incluindo a fertilização, a gravidez e o desenvolvimento fetal. Também são discutidos os métodos de contracepção e planejamento familiar. \n",
        "3) Métodos contraceptivos: A educação sexual informa sobre diferentes métodos contraceptivos disponíveis, como pílulas anticoncepcionais, preservativos, dispositivos intrauterinos (DIUs), implantes contraceptivos, entre outros. São abordadas suas eficácias, usos adequados e possíveis efeitos colaterais. \n",
        "4) Prevenção de doenças sexualmente transmissíveis (DSTs): É ensinado sobre a transmissão, os sintomas, o diagnóstico e a prevenção das DSTs, bem como a importância do teste regular e do uso de preservativos para reduzir o risco de infecção. \n",
        "5) Consentimento e relacionamentos saudáveis: A educação sexual trata de questões relacionadas ao consentimento, comunicação saudável, respeito mútuo e prevenção de relacionamentos abusivos. Também enfoca a importância de relacionamentos seguros e consensuais. \n",
        "6) Orientação sexual e identidade de gênero: Esse tópico aborda a diversidade sexual e de gênero, fornecendo informações sobre diferentes orientações sexuais (como heterossexualidade, homossexualidade, bissexualidade) e identidades de gênero (como cisgênero, transgênero, não-binário). A educação sexual visa combater a discriminação e o preconceito relacionados a essas questões. \n",
        "7) Saúde emocional e bem-estar: A educação sexual enfatiza a importância do autocuidado, da saúde emocional e do bem-estar em relação à sexualidade. Isso inclui promover a autoestima, a aceitação do corpo, a expressão saudável da sexualidade e a busca de apoio quando necessário. \n",
        "É importante ressaltar que a abordagem e a profundidade desses tópicos podem variar de acordo com a idade e o contexto cultural, e a educação sexual deve ser adaptada às necessidades e ao desenvolvimento dos indivíduos."
    ],
    respostaSugestoesFalarSobre: [
        "A decisão de quando começar a falar sobre educação sexual com seu filho depende de vários fatores, incluindo a idade e o desenvolvimento dele, suas experiências prévias, seu ambiente familiar e cultural, e suas próprias crenças e valores. No entanto, é recomendado iniciar conversas sobre sexualidade de forma gradual e adaptada à maturidade da criança. \n",
        "Algumas diretrizes gerais podem ajudar na abordagem da educação sexual com seu filho: \n",
        "1) Comece cedo: A educação sexual não é uma conversa única, mas sim um processo contínuo. Começar a falar sobre o corpo, as diferenças entre meninos e meninas, a privacidade e o respeito desde cedo ajuda a estabelecer uma base sólida para conversas futuras. \n",
        "2) Aja conforme a curiosidade da criança: As crianças começam a fazer perguntas sobre sexualidade em idades diferentes. Responda às perguntas de forma clara e adequada à idade, evitando informações excessivas ou detalhadas demais. \n",
        "3) Seja honesto e use linguagem apropriada: Use termos corretos para órgãos genitais e funções corporais. Evite criar nomes alternativos ou usar eufemismos, pois isso pode causar confusão ou transmitir a mensagem de que a sexualidade é algo vergonhoso. \n",
        "4) Adapte a informação à idade: A educação sexual deve ser adequada ao nível de compreensão da criança. Conforme ela cresce, é possível fornecer informações mais detalhadas, abordando gradualmente tópicos como reprodução, mudanças corporais na puberdade, consentimento e relacionamentos saudáveis. \n",
        "5) Esteja disponível para conversas contínuas: Encoraje seu filho a fazer perguntas e esteja disposto a responder de forma honesta. Crie um ambiente aberto e seguro, onde ele se sinta à vontade para falar sobre sexualidade e receber suporte quando necessário. \n",
        "6) Use recursos educacionais apropriados: Além de conversas diretas, utilize livros, vídeos ou materiais educativos que abordem a educação sexual de forma adequada à idade da criança. Esses recursos podem complementar e reforçar as informações transmitidas \n",
        "Lembre-se de que a educação sexual deve ser contínua ao longo do desenvolvimento da criança e da adolescência, acompanhando suas necessidades e respondendo às suas perguntas à medida que surgirem. Se você tiver dúvidas sobre como abordar esse assunto, consulte profissionais de saúde, educadores ou psicólogos especializados em educação sexual."
    ],
    respostaSugestoesFalarSobreChildren: [
        "Abordar a educação sexual de forma adequada com crianças envolve criar um ambiente seguro, aberto e respeitoso, onde elas possam fazer perguntas, receber informações claras e desenvolver uma compreensão saudável da sexualidade. Aqui estão algumas orientações para abordar a educação sexual de forma adequada com crianças: \n",
        "1) Esteja preparado e informado: Antes de iniciar a conversa, eduque-se sobre os tópicos relevantes à idade da criança. Familiarize-se com os fatos e informações básicas sobre anatomia, puberdade, relacionamentos saudáveis e privacidade. \n",
        "2) Escolha o momento adequado: Escolha um momento calmo e privado para conversar com a criança. Evite interrupções ou distrações que possam tornar a conversa desconfortável ou inadequada. \n",
        "3) Responda às perguntas com clareza e honestidade: Quando a criança fizer perguntas sobre sexualidade, responda de forma clara, objetiva e honesta, utilizando uma linguagem adequada à idade dela. Evite fornecer informações excessivas ou detalhes desnecessários, mas seja sincero e acolhedor. \n",
        "4) Promova uma atitude positiva em relação ao corpo: Ensine à criança que o corpo é natural e bonito, e que ela deve respeitar e cuidar dele. Use os termos corretos para os órgãos genitais e explique que cada pessoa tem partes íntimas que devem ser tratadas com privacidade. \n",
        "5) Enfatize a importância do consentimento: Explique para a criança que ninguém deve tocar seu corpo sem o seu consentimento, e que ela também deve respeitar o corpo dos outros. Ensine que o consentimento deve ser claro, mútuo e contínuo. \n",
        "6) Aborde a diversidade e a inclusão: Explique para a criança que existem diferentes tipos de famílias, relacionamentos e identidades de gênero. Promova a compreensão e o respeito pela diversidade, mostrando que todas as pessoas merecem igualdade e respeito. \n",
        "7) Use recursos educacionais apropriados: Utilize livros, vídeos ou materiais educativos específicos para crianças que abordem a sexualidade de forma adequada à idade e ao desenvolvimento delas. Esses recursos podem ajudar a transmitir informações de maneira visual e acessível. \n",
        "8) Mantenha uma comunicação contínua: A educação sexual é um processo contínuo. Esteja disposto a responder às perguntas da criança ao longo do tempo e a abordar novos tópicos à medida que ela cresce e amadurece. \n",
        "Lembre-se de que cada criança é única, e é importante adaptar a abordagem às suas necessidades, compreensão e maturidade. Se você tiver dúvidas ou sentir dificuldades, não hesite em procurar orientação de profissionais de saúde, educadores ou psicólogos especializados em educação sexual infantil."
    ]
};

sugestion.forEach((cell) => {
    cell.addEventListener("click", () => {
        const textCell = cell.innerText;
        if (textCell === "Como deixar meu depoimento?") {
            criarNovaMensagemUsuario(textCell);
            criarNovaMensagemBot(tabela.respostasDepoi[0]);
        }
        if (textCell === "O que é educação sexual?")
        {
            criarNovaMensagemUsuario(textCell);
            criarNovaMensagemBot(tabela.respostaSugestoes[0]);
        } else if (textCell === "Por que a educação sexual é importante?")
        {
            criarNovaMensagemUsuario(textCell);
            criarNovaMensagemBot(tabela.respostaSugestoes[1] + '\n' + tabela.respostaSugestoes[2] + '\n' + tabela.respostaSugestoes[3] + '\n' + tabela.respostaSugestoes[4] + '\n' + tabela.respostaSugestoes[5] + '\n' + tabela.respostaSugestoes[6] + '\n' + tabela.respostaSugestoes[7] + '\n' + tabela.respostaSugestoes[8] + '\n' + tabela.respostaSugestoes[9]);
        } else if (textCell.includes("Quais são os principais tópicos"))
        {
            const criarListaSugestoesAbout = () => {
                const lista = document.createElement("ul");
                tabela.respostaSugestoesAbout.forEach((item) => {
                    const listItem = document.createElement("li");
                    listItem.textContent = item;
                    lista.appendChild(listItem);
                });
                return lista;
            };

            criarNovaMensagemUsuario(textCell);
            criarNovaMensagemBot(criarListaSugestoesAbout());
        } else if (textCell.includes("Quando devo começar a falar sobre"))
        {
            criarNovaMensagemUsuario(textCell);
            criarNovaMensagemBot(tabela.respostaSugestoesFalarSobre[0] + tabela.respostaSugestoesFalarSobre[1] + tabela.respostaSugestoesFalarSobre[2] + tabela.respostaSugestoesFalarSobre[3] + tabela.respostaSugestoesFalarSobre[4] + tabela.respostaSugestoesFalarSobre[5] + tabela.respostaSugestoesFalarSobre[6] + tabela.respostaSugestoesFalarSobre[7] + tabela.respostaSugestoesFalarSobre[8]);
        } else if (textCell.includes("Como abordar a educação sexual"))
        {
            criarNovaMensagemUsuario(textCell);
            criarNovaMensagemBot(tabela.respostaSugestoesFalarSobreChildren[0] + tabela.respostaSugestoesFalarSobreChildren[1] + tabela.respostaSugestoesFalarSobreChildren[2] + tabela.respostaSugestoesFalarSobreChildren[3] + tabela.respostaSugestoesFalarSobreChildren[4] + tabela.respostaSugestoesFalarSobreChildren[5] + tabela.respostaSugestoesFalarSobreChildren[6] + tabela.respostaSugestoesFalarSobreChildren[7] + tabela.respostaSugestoesFalarSobreChildren[8] + tabela.respostaSugestoesFalarSobreChildren[9]);
        }
    });
});

const main = document.querySelector(".msger-chat");

const respostas = [
    'Eu sou um assistente virtual.',
    'Meu nome é HelpChat.',
    'Eu estou aqui para responder às suas perguntas.',
    'Olá! Como posso ajudar?',
    'Bom dia! Sou a HelpChat, como posso ajudar?',
    'Boa tade! Como posso ajudar?',
    'Boa noite! Como posso ajudar?'
];

const criarNovaMensagemUsuario = (mensagem) => {
    const novaMsg = document.createElement('div');
    novaMsg.classList.add('msg', 'right-msg');

    const msgImg = document.createElement('div');
    msgImg.classList.add('msg-img');
    msgImg.style.backgroundImage = "url('../img/user.png')";

    const msgBubble = document.createElement('div');
    msgBubble.classList.add('msg-bubble');

    const msgInfo = document.createElement('div');
    msgInfo.classList.add('msg-info');

    const nomeUsuario = '<?php echo $dadosUser["nome"];?>';
    const msgInfoNameUser = document.createElement('div');
    msgInfoNameUser.classList.add('msg-info-name-user');
    msgInfoNameUser.innerHTML = nomeUsuario;

    const msgInfoTimeUser = document.createElement('div');
    msgInfoTimeUser.classList.add('msg-info-time-user');

    const msgTextUser = document.createElement('div');
    msgTextUser.classList.add('msg-text-user');
    msgTextUser.innerText = mensagem;

    msgInfo.appendChild(msgInfoNameUser);
    msgInfo.appendChild(msgInfoTimeUser);
    msgBubble.appendChild(msgInfo);
    msgBubble.appendChild(msgTextUser);
    novaMsg.appendChild(msgImg);
    novaMsg.appendChild(msgBubble);

    main.appendChild(novaMsg);
}

const criarNovaMensagemBot = (mensagem) => {
    const novaMsg = document.createElement('div');
    novaMsg.classList.add('msg', 'left-msg');

    const msgImg = document.createElement('div');
    msgImg.classList.add('msg-img');
    msgImg.style.backgroundImage = "url('../img/user.png')";

    const msgBubble = document.createElement('div');
    msgBubble.classList.add('msg-bubble');

    const msgInfo = document.createElement('div');
    msgInfo.classList.add('msg-info');

    const msgInfoName = document.createElement('div');
    msgInfoName.classList.add('msg-info-name');
    msgInfoName.innerText = 'HelpChat';

    const msgTextBot = document.createElement('div');
    msgTextBot.classList.add('msg-text-bot');
    msgTextBot.innerText = mensagem;

    msgInfo.appendChild(msgInfoName);
    msgBubble.appendChild(msgInfo);
    msgBubble.appendChild(msgTextBot);
    novaMsg.appendChild(msgImg);
    novaMsg.appendChild(msgBubble);

    main.appendChild(novaMsg);

    var typeTime;
    function typeWrite(elemento) {
        const textoArray = elemento.innerHTML.split('');
        elemento.innerHTML = '';
        textoArray.forEach((letra, i) => {
            typeTime = setTimeout(() => elemento.innerHTML += letra, 30 * i);
        });
    }

    const novaMsgBot = document.querySelector('.left-msg:last-child');
    const texto = novaMsgBot.querySelector('.msg-text-bot');
    typeWrite(texto);

    const btnGroup = document.querySelector(".btn-group");
    const msgBubbleElement = novaMsgBot.querySelector('.msg-bubble');

    if (msgBubbleElement.classList.contains('typing-finished')) btnGroup.style.display = 'none';
    else btnGroup.style.display = 'block';

    document.querySelector(".pause").addEventListener("click", () => {
        clearTimeout(typeTime);
        console.log("pause");
    });

    document.querySelector(".end").addEventListener("click", () => {
        clearTimeout(typeTime);
        msgTextBot.innerText = mensagem;
        console.log("end");
    });
}

btnEnviar.addEventListener('click', () => {
    const pergunta = inputPergunta.value.toLowerCase();

    if (pergunta.includes('quem') && (pergunta.includes('você') || pergunta.includes('voce') || pergunta.includes('vc')))
    {
        criarNovaMensagemUsuario(inputPergunta.value);
        criarNovaMensagemBot(respostas[0]);
        inputPergunta.value = '';
    } else if (pergunta.includes('qual') && pergunta.includes('seu nome'))
    {
        criarNovaMensagemUsuario(inputPergunta.value);
        criarNovaMensagemBot(respostas[1]);
        inputPergunta.value = '';
    } else if (pergunta.includes('o que') && (pergunta.includes('você faz') || pergunta.includes('voce faz') || pergunta.includes('vc faz')))
    {
        criarNovaMensagemUsuario(inputPergunta.value);
        criarNovaMensagemBot(respostas[2]);
        inputPergunta.value = '';
    } else if (pergunta.includes('ola') || pergunta.includes('olá') || pergunta.includes('oi'))
    {
        criarNovaMensagemUsuario(inputPergunta.value);
        criarNovaMensagemBot(respostas[3]);
        inputPergunta.value = '';
    } else if (pergunta.includes('bom dia'))
    {
        criarNovaMensagemUsuario(inputPergunta.value);
        criarNovaMensagemBot(respostas[4]);
        inputPergunta.value = '';
    } else if (pergunta.includes('boa tarde'))
    {
        criarNovaMensagemUsuario(inputPergunta.value);
        criarNovaMensagemBot(respostas[5]);
        inputPergunta.value = '';
    } else if (pergunta.includes('boa noite'))
    {
        criarNovaMensagemUsuario(inputPergunta.value);
        criarNovaMensagemBot(respostas[6]);
        inputPergunta.value = '';
    } else
    {
        criarNovaMensagemUsuario(inputPergunta.value);
        criarNovaMensagemBot('Desculpe, não entendi sua pergunta');
        inputPergunta.value = '';
    }
});

window.addEventListener("keypress", (event) => {
    if (event.key === "Enter")
    {
        event.preventDefault();
        btnEnviar.click();
    }
});

/* CARREGAMENTO */

// Seleciona o overlay
var overlay = document.getElementById("loading-overlay");

// Esconde o overlay quando a página estiver carregada
window.addEventListener("load", function () {
    overlay.style.display = "none";
});

// Mostra o overlay quando a página começar a carregar
window.addEventListener("beforeunload", function () {
    overlay.style.display = "flex";
});

/* DARK MODE */

const rootElement = document.querySelector("body");
rootElement.classList.add('light');

document.getElementById("switch").addEventListener("change", () => {
    if (rootElement.classList.contains('light'))
    {
        rootElement.classList.remove('light');
        rootElement.classList.add('dark');
    } else if (rootElement.classList.contains('dark'))
    {
        rootElement.classList.remove('dark');
        rootElement.classList.add('light');
    }
});

/* MENU DROPDOWN */

document.querySelector(".dropdown").addEventListener("click", () => {
    if (document.querySelector(".dropdown-content").style.display == 'block')
    {
        document.querySelector(".dropdown-content").style.display = 'none';
    } else
    {
        document.querySelector(".dropdown-content").style.display = 'block';
    }
});

/* SAIR DA PÁGINA */

document.querySelector("a").addEventListener("click", function (event) {
    event.preventDefault();
    swal({
        title: 'Não vá :(',
        text: 'Caso vá, quer deixar algum depoimento sobre nossa conversa?',
        icon: 'warning',
        buttons: ['Não', 'Sim'],
    })
        .then((confirm) => {
            if (confirm) location.href = 'depoimento.php';
            else location.href = '../../index.php';
        });
});
