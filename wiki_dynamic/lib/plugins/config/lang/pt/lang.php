<?php
/**
 * Portugueselanguage file
 *
 * @author José Monteiro <Jose.Monteiro@DoWeDo-IT.com>
 * @author Enrico Nicoletto <liverig@gmail.com>
 * @author Fil <fil@meteopt.com>
 * @author André Neves <drakferion@gmail.com>
 */
$lang['menu']                  = 'Configuração';
$lang['error']                 = 'Parâmetros de Configuração não actualizados devido a valores inválidos. Por favor, reveja as modificações que pretende efectuar antes de re-submetê-las.<br /> Os valores incorrectos serão mostrados dentro de uma "moldura" vermelha.';
$lang['updated']               = 'Parâmetros de Configuração actualizados com sucesso.';
$lang['nochoice']              = '(não existem outras escolhas disponíveis)';
$lang['locked']                = 'O ficheiro de configuração não pôde ser actualizado, se isso foi não intencional, <br />certifique-se que o nome e as permissões do ficheiro de configuração estejam correctas.
';
$lang['danger']                = 'Perigo: Alterar esta opção poderá tornar o seu wiki e o menu de configuração inacessíveis.';
$lang['warning']               = 'Aviso: A alteração desta opção poderá causar comportamento involuntário.';
$lang['security']              = 'Aviso de segurança: Alterar esta opção pode apresentar um risco de segurança.';
$lang['_configuration_manager'] = 'Gestor de Parâmetros de Configuração';
$lang['_header_dokuwiki']      = 'Parâmetros DokuWiki';
$lang['_header_plugin']        = 'Parâmetros dos Plugins';
$lang['_header_template']      = 'Parâmetros das Templates';
$lang['_header_undefined']     = 'Parâmetros não definidos';
$lang['_basic']                = 'Configurações Básicas';
$lang['_display']              = 'Configuração de Apresentação';
$lang['_authentication']       = 'Configuração de Autenticação';
$lang['_anti_spam']            = 'Configuração Anti-Spam';
$lang['_editing']              = 'Configuração de Edição';
$lang['_links']                = 'Configuração de Ligações';
$lang['_media']                = 'Configuração de Media';
$lang['_advanced']             = 'Configurações Avançadas';
$lang['_network']              = 'Configuração de Rede';
$lang['_plugin_sufix']         = 'Configuração dos Plugins';
$lang['_template_sufix']       = 'Configuração das Templates';
$lang['_msg_setting_undefined'] = 'Nenhum metadado configurado.';
$lang['_msg_setting_no_class'] = 'Nenhuma classe definida.';
$lang['_msg_setting_no_default'] = 'Sem valor por omissão.';
$lang['fmode']                 = 'Modo de criação de ficheiros.';
$lang['dmode']                 = 'Modo de criação de pastas.';
$lang['lang']                  = 'Idioma';
$lang['basedir']               = 'Pasta Base';
$lang['baseurl']               = 'URL Base';
$lang['savedir']               = 'Pasta para guardar dados';
$lang['start']                 = 'Nome da Página Inicial';
$lang['title']                 = 'Título deste Wiki';
$lang['template']              = 'Template';
$lang['license']               = 'Sob que licença o seu conteúdo deverá ser disponibilizado?';
$lang['fullpath']              = 'Revelar caminho completo no rodapé';
$lang['recent']                = 'Alterações recentes';
$lang['breadcrumbs']           = 'Número máximo de breadcrumbs';
$lang['youarehere']            = 'Breadcrumbs hierárquicas';
$lang['typography']            = 'Executar substituições tipográficas';
$lang['htmlok']                = 'Permitir embeber HTML';
$lang['phpok']                 = 'Permitir embeber PHP';
$lang['dformat']               = 'Formato de Data (ver função PHP\'s <a href="http://www.php.net/strftime">strftime</a>)';
$lang['signature']             = 'Assinatura';
$lang['toptoclevel']           = 'Nível de topo para a tabela de conteúdo';
$lang['tocminheads']           = 'Quantidade mínima de cabeçalhos para a construção da tabela de conteúdos.';
$lang['maxtoclevel']           = 'Máximo nível para a tabela de conteúdo';
$lang['maxseclevel']           = 'Máximo nível para editar secção';
$lang['camelcase']             = 'Usar CamelCase';
$lang['deaccent']              = 'Nomes das páginas sem acentos';
$lang['useheading']            = 'Usar o primeiro cabeçalho para o nome da página';
$lang['refcheck']              = 'Verificação de referência da media';
$lang['refshow']               = 'Número de referências de media a exibir';
$lang['allowdebug']            = 'Permitir depuração <b>desabilite se não for necessário!</b>';
$lang['usewordblock']          = 'Bloquear spam baseado em lista de palavras (wordlist)';
$lang['indexdelay']            = 'Tempo de espera antes da indexação (seg)';
$lang['relnofollow']           = 'Usar rel="nofollow" em links externos';
$lang['mailguard']             = 'Obscurecer endereços de email';
$lang['iexssprotect']          = 'Verificar os arquivos enviados contra possíveis códigos maliciosos em HTML ou JavaScript';
$lang['showuseras']            = 'O que exibir quando mostrar o utilizador que editou a página pela última vez';
$lang['useacl']                = 'Usar ACL - Listas de Controlo de Acessos';
$lang['autopasswd']            = 'Auto-gerar senhas';
$lang['authtype']              = 'Método de autenticação';
$lang['passcrypt']             = 'Método de cifragem da senha';
$lang['defaultgroup']          = 'Grupo por omissão';
$lang['superuser']             = 'Superutilizador - um grupo, utilizador ou uma lista separada por vírgulas usuário1,@grupo1,usuário2 que tem acesso completo a todas as páginas e funções, independente das definições da ACL';
$lang['manager']               = 'Gestor - um grupo, utilizador ou uma lista separada por vírgulas usuário1,@grupo1,usuário2 que tem acesso a certas funções de gestão';
$lang['profileconfirm']        = 'Confirmar mudanças no perfil com a senha';
$lang['disableactions']        = 'Desactivar acções DokuWiki';
$lang['disableactions_check']  = 'Checar';
$lang['disableactions_subscription'] = 'Subscrever/Não Subscrver';
$lang['disableactions_nssubscription'] = 'Subscrever / Dessubscrever Espaço de Nome';
$lang['disableactions_wikicode'] = 'Ver fonte/Exportar em bruto';
$lang['disableactions_other']  = 'Outras acções (separadas por vírgula)';
$lang['sneaky_index']          = 'Por norma, o DokuWiki irá exibir todos os espaços de nomes na visualização do índice. Ao habilitar essa opção, serão escondidos aqueles em que o utilizador não tenha permissão de leitura. Isto pode resultar na omissão de sub-ramos acessíveis, que poderá tornar o índice inútil para certas configurações de ACL.';
$lang['auth_security_timeout'] = 'Tempo limite de segurança para autenticações (seg)';
$lang['securecookie']          = 'Os cookies definidos via HTTPS deverão ser enviados para o navegador somente via HTTPS? Desabilite essa opção quando somente a autenticação do seu wiki for realizada de maneira segura via SSL e a navegação de maneira insegura.';
$lang['xmlrpc']                = 'Habilitar/desabilitar interface XML-RPC.';
$lang['xmlrpcuser']            = 'Restringir acesso XML-RPC para os grupos separados por vírgula ou utilizadores inseridos aqui. Deixar vazio para dar acesso a todos.';
$lang['updatecheck']           = 'Verificar por actualizações e avisos de segurança? O DokuWiki precisa contactar o "splitbrain.org" para efectuar esta verificação.';
$lang['userewrite']            = 'Usar URLs SEO';
$lang['useslash']              = 'Usar a barra como separador de espaços de nomes nas URLs';
$lang['usedraft']              = 'Guardar o rascunho automaticamente durante a edição';
$lang['sepchar']               = 'Separador de palavras no nome da página';
$lang['canonical']             = 'Usar URLs absolutas (http://servidor/caminho)';
$lang['autoplural']            = 'Verificar formas plurais nos links';
$lang['compression']           = 'Método de compressão para histórico';
$lang['cachetime']             = 'Idade máxima para cache (seg.)';
$lang['locktime']              = 'Idade máxima para locks (seg.)';
$lang['fetchsize']             = 'Tamanho máximo (bytes) que o fetch.php pode transferir do exterior';
$lang['notify']                = 'Enviar notificações de mudanças para este endereço de email';
$lang['registernotify']        = 'Enviar informações de utilizadores registados para este endereço de email';
$lang['mailfrom']              = 'Endereço de email a ser utilizado para mensagens automáticas';
$lang['gzip_output']           = 'Usar "Content-Encoding" do gzip para o código xhtml';
$lang['gdlib']                 = 'Versão GD Lib';
$lang['im_convert']            = 'Caminho para a ferramenta "convert" do ImageMagick';
$lang['jpg_quality']           = 'Compressão/Qualidade JPG (0-100)';
$lang['subscribers']           = 'Habilitar o suporte a subscrição de páginas ';
$lang['compress']              = 'Compactar as saídas de CSS e JavaScript';
$lang['hidepages']             = 'Esconder páginas correspondentes (expressões regulares)';
$lang['send404']               = 'Enviar "HTTP 404/Página não encontrada" para páginas não existentes';
$lang['sitemap']               = 'Gerar Sitemap Google (dias)';
$lang['broken_iua']            = 'A função "ignore_user_abort" não está a funcionar no seu sistema? Isso pode causar um índice de busca defeituoso. Sistemas com IIS+PHP/CGI são conhecidos por possuírem este problema. Veja o <a href="http://bugs.splitbrain.org/?do=details&amp;task_id=852">bug 852</a> para mais informações.';
$lang['xsendfile']             = 'Usar o cabeçalho "X-Sendfile" para permitir o servidor de internet encaminhar ficheiros estáticos? O seu servidor de internet precisa ter suporte a isso.';
$lang['renderer_xhtml']        = 'Renderizador a ser utilizado para a saída principal do wiki (xhtml)';
$lang['renderer__core']        = '%s (núcleo dokuwiki)';
$lang['renderer__plugin']      = '%s (plugin)';
$lang['rememberme']            = 'Permitir cookies de autenticação permanentes (Memorizar?)';
$lang['rss_type']              = 'Tipo de feed XML';
$lang['rss_linkto']            = 'Links de feed XML ara';
$lang['rss_content']           = 'O que deve ser exibido nos itens do alimentador XML?';
$lang['rss_update']            = 'Intervalo de actualização do alimentador XML (seg)';
$lang['recent_days']           = 'Quantas mudanças recentes devem ser mantidas? (dias)';
$lang['rss_show_summary']      = 'Resumo de exibição do alimentador XML no título';
$lang['target____wiki']        = 'Parâmetro "target" para links internos';
$lang['target____interwiki']   = 'Parâmetro "target" para links entre wikis';
$lang['target____extern']      = 'Parâmetro "target" para links externos';
$lang['target____media']       = 'Parâmetro "target" para links de media';
$lang['target____windows']     = 'Parâmetro "target" para links do Windows';
$lang['proxy____host']         = 'Nome do servidor proxy';
$lang['proxy____port']         = 'Porta de Proxy';
$lang['proxy____user']         = 'Nome de utilizador Proxy';
$lang['proxy____pass']         = 'Password de Proxy ';
$lang['proxy____ssl']          = 'Usar SSL para conectar ao proxy';
$lang['safemodehack']          = 'Habilitar modo de segurança';
$lang['ftp____host']           = 'Servidor FTP para o modo de segurança';
$lang['ftp____port']           = 'Porta de FTP para o modo de segurança';
$lang['ftp____user']           = 'Nome do utilizador FTP para o modo de segurança';
$lang['ftp____pass']           = 'Senha do utilizador FTP para o modo de segurança';
$lang['ftp____root']           = 'Directoria raiz do FTP para o modo de segurança';
$lang['license_o_']            = 'Nenhuma escolha';
$lang['typography_o_0']        = 'nenhum';
$lang['typography_o_1']        = 'Apenas entre aspas';
$lang['typography_o_2']        = 'Entre aspas e apóstrofes';
$lang['userewrite_o_0']        = 'nenhum';
$lang['userewrite_o_1']        = '.htaccess';
$lang['userewrite_o_2']        = 'interno (DokuWiki)';
$lang['deaccent_o_0']          = 'desligado';
$lang['deaccent_o_1']          = 'remover acentos';
$lang['deaccent_o_2']          = 'romanizar';
$lang['gdlib_o_0']             = 'A GD Lib não está disponível';
$lang['gdlib_o_1']             = 'Versão 1.x';
$lang['gdlib_o_2']             = 'Auto-detecção';
$lang['rss_type_o_rss']        = 'RSS 0.91';
$lang['rss_type_o_rss1']       = 'RSS 1.0';
$lang['rss_type_o_rss2']       = 'RSS 2.0';
$lang['rss_type_o_atom']       = 'Atom 0.3';
$lang['rss_type_o_atom1']      = 'Atom 1.0';
$lang['rss_content_o_abstract'] = 'Abstracto';
$lang['rss_content_o_diff']    = 'Diferenças Unificadas';
$lang['rss_content_o_htmldiff'] = 'Tabela de diff formatada em HTML';
$lang['rss_content_o_html']    = 'Conteúdo completo da página em HTML';
$lang['rss_linkto_o_diff']     = 'vista de diferenças';
$lang['rss_linkto_o_page']     = 'página revista';
$lang['rss_linkto_o_rev']      = 'lista de revisões';
$lang['rss_linkto_o_current']  = 'página actual';
$lang['compression_o_0']       = 'Sem Compressão';
$lang['compression_o_gz']      = 'gzip';
$lang['compression_o_bz2']     = 'bz2';
$lang['xsendfile_o_0']         = 'não usar';
$lang['xsendfile_o_1']         = 'Cabeçalho proprietário lighttpd (anterior à versão 1.5)';
$lang['xsendfile_o_2']         = 'Cabeçalho "X-Sendfile" padrão';
$lang['xsendfile_o_3']         = 'Cabeçalho proprietário "Nginx X-Accel-Redirect"';
$lang['showuseras_o_loginname'] = 'Nome de utilizador';
$lang['showuseras_o_username'] = 'Nome completo do utilizador';
$lang['showuseras_o_email']    = 'Endereço email do utilizador (ofuscado de acordo com a configuração mailguard)';
$lang['showuseras_o_email_link'] = 'Endereço de e-mail de usuário como um link "mailto:"';
$lang['useheading_o_0']        = 'Nunca';
$lang['useheading_o_navigation'] = 'Apenas Navegação';
$lang['useheading_o_content']  = 'Apenas Conteúdo Wiki';
$lang['useheading_o_1']        = 'Sempre';
