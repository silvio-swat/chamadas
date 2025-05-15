# Projeto: Sistema de Chamada de Senhas em PHP Laravel

Este repositório contém o código-fonte de um sistema de gerenciamento de senhas, desenvolvido em PHP Laravel. Contém Auth2 com Laravel Passport, Cadastro de Usuário, Papéis, Recursos, Filas, Menus Personalizado, uso de Web Sockets e muito mais.

## Descrição do Sistema

O sistema consiste em um servidor onde é possível:

- **Cadastrar usuários e filas:** Cada usuário pode gerenciar filas específicas.
- **Emitir senhas:** Clientes podem imprimir senhas para filas distintas. Também é possível gerar senhas personalizadas para atender clientes com necessidades especiais, permitindo prioridade.
- **Gerenciar atendimento:**
  - Cada senha chamada é atribuída à fila do usuário responsável.
  - O sistema registra a data/hora de entrada e saída de cada atendimento.
  - Após finalizar o atendimento, o cliente pode ser encaminhado para outras filas autorizadas.

## Tecnologias Utilizadas

- **Back-end:** PHP Laravel
- **Front-end:** Livewire, Alpine.js, Tailwind CSS
- **Comunicação em tempo real:** WebSockets para integração entre servidor, painel de senhas e usuários
- **Aplicativo de Painel:** Aplicação desenvolvida em C# para exibição das chamadas em uma TV LCD conectada a um PC. O repositório do aplicativo está disponível aqui neste perfil.

## Funcionalidades Implementadas

- **Autenticação com ACL (Controle de Acesso):**
  - Gerenciamento de permissões baseadas em papéis ou usuários específicos.
- **Chamada de Senhas em Tempo Real:**
  - Comunicação estável e rápida entre o servidor e os dispositivos conectados (painéis e usuários).

---
_Aproveite este projeto como base para implementar sistemas similares ou para aprender mais sobre Laravel, WebSockets e integrações front-end._
