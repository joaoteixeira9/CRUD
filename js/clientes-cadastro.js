// ======================================
// FUNÇÕES DE VALIDAÇÃO
// ======================================

// Validação de E-mail
const validarEmail = (email) => {
    return /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(email);
  };
  
  // Validação de Senha Forte
  const validarSenha = (senha) => {
    return senha.length >= 8 &&
           /[A-Z]/.test(senha) &&
           /[a-z]/.test(senha) &&
           /\d/.test(senha) &&
           /[!@#$%^&*(),.?":{}|<>]/.test(senha);
  };
  
  // Validação de Data (DD/MM/AAAA)
  const validarData = (dataStr) => {
    const partes = dataStr.split('/');
    if (partes.length !== 3) return false;
    
    const [dia, mes, ano] = partes.map(Number);
    const data = new Date(ano, mes - 1, dia);
    
    return (data.getDate() === dia && 
            data.getMonth() + 1 === mes && 
            data.getFullYear() === ano);
  };
  
  // Validação de Telefone (11 dígitos)
  const validarTelefone = (telefone) => {
    const numeros = telefone.replace(/\D/g, '');
    return numeros.length === 11 && /^\d+$/.test(numeros);
  };
  
  // Validação de Tipo e Comprimento
  const validarEntrada = (valor, tipo, maxLength = null) => {
    if (typeof valor !== tipo) return false;
    if (tipo === 'string' && maxLength && valor.length > maxLength) return false;
    return true;
  };
  
  // Sanitização contra XSS
  const sanitizar = (valor) => {
    if (typeof valor === 'string') {
      return valor
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
        .replace(/'/g, '&#39;')
        .replace(/"/g, '&#34;');
    }
    return valor;
  };
  
  // ======================================
  // EXEMPLO DE USO
  // ======================================
  
  const dadosUsuario = {
    nome: 'Ana Silva',
    email: 'ana@exemplo.com',
    senha: 'Senha@123',
    nascimento: '15/07/1995',
    telefone: '(11) 98765-4321',
    idade: 28
  };
  
  const erros = [];
  
  // Validações
  if (!validarEntrada(dadosUsuario.nome, 'string', 100)) {
    erros.push('Nome deve ter até 100 caracteres');
  }
  
  if (!validarEmail(dadosUsuario.email)) {
    erros.push('Formato de e-mail inválido');
  }
  
  if (!validarSenha(dadosUsuario.senha)) {
    erros.push('Senha precisa ter: 8+ caracteres, letras maiúsculas/minúsculas, números e símbolos');
  }
  
  if (!validarData(dadosUsuario.nascimento)) {
    erros.push('Data de nascimento inválida (use DD/MM/AAAA)');
  }
  
  if (!validarTelefone(dadosUsuario.telefone,'string' ,11)) {
    erros.push('Telefone deve ter 11 dígitos (ex: 11987654321)');
  }
  
  if (!validarEntrada(dadosUsuario.idade, 'number')) {
    erros.push('Idade deve ser um número');
  }
  
  // Sanitização
  dadosUsuario.nome = sanitizar(dadosUsuario.nome);
  dadosUsuario.email = sanitizar(dadosUsuario.email);
  
  // ======================================
  // RESULTADO
  // ======================================
  
  if (erros.length > 0) {
    console.error('❌ Erros encontrados:');
    erros.forEach((erro, index) => console.log(`${index + 1}. ${erro}`));
  } else {
    console.log('✅ Dados válidos:', dadosUsuario);
  }
  
  // ======================================
  // EXTRA: Formatar Telefone
  // ======================================
  dadosUsuario.telefone = dadosUsuario.telefone
    .replace(/\D/g, '')
    .replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3');
  
  console.log('Telefone formatado:', dadosUsuario.telefone);