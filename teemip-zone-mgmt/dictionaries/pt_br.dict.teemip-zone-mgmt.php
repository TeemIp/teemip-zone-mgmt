<?php
/*
 * @copyright   Copyright (C) 2010-2025 TeemIp
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

//
// Class extensions for IPConfig
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:IPConfig/Attribute:ip_update_dns_records' => 'Atualizar registros DNS automaticamente',
	'Class:IPConfig/Attribute:ip_update_dns_records+' => 'Criar, modificar ou excluir automaticamente Registros de Recurso vinculados a um endereço IP',
	'Class:IPConfig/Attribute:ip_update_dns_records/Value:yes' => 'Sim',
	'Class:IPConfig/Attribute:ip_update_dns_records/Value:no' => 'Não',
	'Class:IPConfig/Attribute:remove_rr_on_ip_obsolete' => 'Remover registros DNS de IPs obsoletos',
	'Class:IPConfig/Attribute:remove_rr_on_ip_obsolete+' => 'Remover Registros de Recurso associados a endereços IP que se tornam obsoletos',
	'Class:IPConfig/Attribute:remove_rr_on_ip_obsolete/Value:yes' => 'Sim',
	'Class:IPConfig/Attribute:remove_rr_on_ip_obsolete/Value:no' => 'Não',
    'Class:IPConfig/Attribute:serial_update_method' => 'Método de atualização do serial',
    'Class:IPConfig/Attribute:serial_update_method+' => 'Método usado para atualizar o número de série de uma zona',
    'Class:IPConfig/Attribute:serial_update_method/Value:increment_by_one' => 'Incrementar em um',
    'Class:IPConfig/Attribute:serial_update_method/Value:set_date' => 'Data, no formato básico ISO 8601, seguida por um contador de dois dígitos',
    'Class:IPConfig/Attribute:serial_update_method/Value:set_ux_time' => 'Data expressa como o número de segundos desde a época UNIX',
    'Class:IPConfig/Attribute:serial_update_method/Value:managed_remotely' => 'O número de série é gerenciado remotamente, fora do aplicativo',
));

//
// Class extensions for IPAddress
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:IPAddress/Attribute:view_id' => 'View DNS',
	'Class:IPAddress/Attribute:view_id+' => 'View DNS da qual o IP é resolvido',
	'Class:IPAddress/Attribute:view_name' => 'Nome da View',
	'Class:IPAddress/Attribute:view_name+' => '',
	'Class:IPAddress/Tab:rrecords_list' => 'Registros DNS',
	'Class:IPAddress/Tab:rrecords_list+' => 'Lista de todos os Registros de Recurso DNS associados ao endereço IP.',
	'Class:IPAddress/Tab:ptrrecords_list' => 'Registros PTR associados ao endereço IP',
	'Class:IPAddress/Tab:ptrrecords_list_empty' => 'Não há registros PTR vinculados a este IP',
	'Class:IPAddress/Tab:arecords_list' => 'Registros A associados ao endereço IP',
	'Class:IPAddress/Tab:arecords_list_empty' => 'Não há registros A vinculados a este IP',
	'Class:IPAddress/Tab:aaaarecords_list' => 'Registros AAAA associados ao endereço IP',
	'Class:IPAddress/Tab:aaaarecords_list_empty' => 'Não há registros AAAA vinculados a este IP',
	'Class:IPAddress/Tab:cnamerecords_list' => 'Registros CNAME associados ao endereço IP',
	'Class:IPAddress/Tab:cnamerecords_list_empty' => 'Não há registros CNAME vinculados a este IP',
));

//
// Class extensions for IPSubnet
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:IPSubnet/Tab:rrecords_list' => 'Registros DNS',
	'Class:IPSubnet/Tab:rrecords_list+' => 'Lista de todos os Registros de Recurso DNS associados à sub-rede.',
	'Class:IPSubnet/Tab:ptrrecords_list' => 'Registros PTR associados à sub-rede',
	'Class:IPSubnet/Tab:ptrrecords_list_empty' => 'Não há registros PTR vinculados a esta sub-rede',
	'Class:IPSubnet/Tab:arecords_list' => 'Registros A associados à sub-rede',
	'Class:IPSubnet/Tab:arecords_list_empty' => 'Não há registros A vinculados a esta sub-rede',
	'Class:IPSubnet/Tab:aaaarecords_list' => 'Registros AAAA associados à sub-rede',
	'Class:IPSubnet/Tab:aaaarecords_list_empty' => 'Não há registros AAAA vinculados a esta sub-rede',
	'Class:IPSubnet/Tab:cnamerecords_list' => 'Registros CNAME associados à sub-rede',
	'Class:IPSubnet/Tab:cnamerecords_list_empty' => 'Não há registros CNAME vinculados a esta sub-rede',
));

//
// Class: View
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:View' => 'View',
	'Class:View+' => 'View DNS',
	'Class:View/Attribute:org_id' => 'Organização',
	'Class:View/Attribute:org_id+' => 'Organização à qual a view pertence',
	'Class:View/Attribute:org_name' => 'Nome da Organização',
	'Class:View/Attribute:org_name+' => '',
	'Class:View/Attribute:name' => 'Nome',
	'Class:View/Attribute:name+' => '',
	'Class:View/Attribute:description' => 'Descrição',
	'Class:View/Attribute:description+' => '',
	'Class:View/Attribute:zones_list' => 'Zonas',
	'Class:View/Attribute:zones_list+' => 'Todas as zonas na view',
));

//
// Class: Zone
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:Zone' => 'Zona',
	'Class:Zone+' => 'Zona DNS',
	'Class:Zone/Name' => '%1$s',
	'Class:Zone:baseinfo' => 'Informações Gerais',
	'Class:Zone:soainfo' => 'Início de Autoridade (SOA)',
	'Class:Zone/Attribute:view_id' => 'View',
	'Class:Zone/Attribute:view_id+' => 'View à qual a zona pertence',
	'Class:Zone/Attribute:mapping' => 'Tipo de mapeamento',
	'Class:Zone/Attribute:mapping+' => 'Tipo de resolução fornecida pela zona: direta, reversa para endereços IPv4 ou reversa para endereços IPv6',
	'Class:Zone/Attribute:mapping/Value:direct' => 'Direta',
	'Class:Zone/Attribute:mapping/Value:direct+' => 'Mapeamento direto',
	'Class:Zone/Attribute:mapping/Value:ipv4reverse' => 'Reversa IPv4',
	'Class:Zone/Attribute:mapping/Value:ipv4reverse+' => 'Mapeamento reverso para endereços IPv4: IPv4 para nome',
	'Class:Zone/Attribute:mapping/Value:ipv6reverse' => 'Reversa IPv6',
	'Class:Zone/Attribute:mapping/Value:ipv6reverse+' => 'Mapeamento reverso para endereços IPv6: IPv6 para nome',
	'Class:Zone/Attribute:name' => 'Nome da Zona',
	'Class:Zone/Attribute:name+' => '',
	'Class:Zone/Attribute:comment' => 'Comentário',
	'Class:Zone/Attribute:comment+' => '',
	'Class:Zone/Attribute:requestor_id' => 'Solicitante',
	'Class:Zone/Attribute:requestor_id+' => 'Pessoa que solicitou a criação ou modificação da zona',
	'Class:Zone/Attribute:requestor_name' => 'Nome do solicitante',
	'Class:Zone/Attribute:requestor_name+' => '',
	'Class:Zone/Attribute:ttl' => 'TTL',
	'Class:Zone/Attribute:ttl+' => 'Time To Live (Tempo de Vida)',
	'Class:Zone/Attribute:sourcedname' => 'Servidor mestre',
	'Class:Zone/Attribute:sourcedname+' => '',
	'Class:Zone/Attribute:mbox' => 'Caixa de correio do Hostmaster',
	'Class:Zone/Attribute:mbox+' => '',
    'Class:Zone/Attribute:serial_update_method' => 'Método de atualização do serial',
    'Class:Zone/Attribute:serial_update_method+' => 'Método usado para atualizar o número de série da zona',
    'Class:Zone/Attribute:serial_update_method/Value:increment_by_one' => 'Incrementar em um',
    'Class:Zone/Attribute:serial_update_method/Value:set_date' => 'Data, no formato básico ISO 8601, seguida por um contador de dois dígitos',
    'Class:Zone/Attribute:serial_update_method/Value:set_ux_time' => 'Data expressa como o número de segundos desde a época UNIX',
    'Class:Zone/Attribute:serial_update_method/Value:managed_remotely' => 'O número de série é gerenciado remotamente, fora do aplicativo',
    'Class:Zone/Attribute:serial_update_method/Value:use_global_config' => 'Siga o que está definido nas configurações globais de IP da organização',
	'Class:Zone/Attribute:serial' => 'Serial',
	'Class:Zone/Attribute:serial+' => '',
	'Class:Zone/Attribute:refresh' => 'Atualização (Refresh)',
	'Class:Zone/Attribute:refresh+' => '',
	'Class:Zone/Attribute:retry' => 'Tentativa (Retry)',
	'Class:Zone/Attribute:retry+' => '',
	'Class:Zone/Attribute:expire' => 'Expiração (Expire)',
	'Class:Zone/Attribute:expire+' => '',
	'Class:Zone/Attribute:minimum' => 'Mínimo (Minimum)',
	'Class:Zone/Attribute:minimum+' => '',
	'Class:Zone/Attribute:functionalcis_list' => 'Servidores autoritativos',
	'Class:Zone/Attribute:functionalcis_list+' => 'Servidores autoritativos responsáveis pela zona',
	'Class:Zone/Tab:nsrecords_list' => 'Registros NS',
	'Class:Zone/Tab:nsrecords_list+' => 'Lista de todos os registros NS da zona',
	'Class:Zone/Tab:arecords_list' => 'Registros A',
	'Class:Zone/Tab:arecords_list+' => 'Lista de todos os Registros A da zona',
	'Class:Zone/Tab:aaaarecords_list' => 'Registros AAAA',
	'Class:Zone/Tab:aaaarecords_list+' => 'Lista de todos os Registros AAAA da zona',
	'Class:Zone/Tab:cnamerecords_list' => 'Registros CNAME',
	'Class:Zone/Tab:cnamerecords_list+' => 'Lista de todos os Registros CNAME da zona',
	'Class:Zone/Tab:ptrrecords_list' => 'Registros PTR',
	'Class:Zone/Tab:ptrrecords_list+' => 'Lista de todos os registros PTR da zona',
	'Class:Zone/Tab:otherrecords_list' => 'Outros Registros',
	'Class:Zone/Tab:otherrecords_list+' => 'Lista de todos os outros Registros da zona',
	'Class:Zone/Tab:records_list' => 'Lista de todos os registros %1$s da zona',
	'Class:Zone/Tab:records_list_empty' => 'Não há registros %1$s na zona',
	'Class:Zone/DataFile:NSRecord' => '
;
; Name servers
;',
	'Class:Zone/DataFile:ARecord' => '
;
; Endereços IPv4 para os nomes canônicos
;',
	'Class:Zone/DataFile:AAAARecord' => '
;
; Endereços IPv6 para os nomes canônicos
;',
	'Class:Zone/DataFile:CAARecord' => '
;
; Autorização da Autoridade de Certificação
;',
	'Class:Zone/DataFile:CNAMERecord' => '
;
; Apelidos (Aliases)
;',
	'Class:Zone/DataFile:DSRecord' => '
;
; Assinantes de Delegação
;',
	'Class:Zone/DataFile:GenericRecord' => '
;
; Outros registros
;',
	'Class:Zone/DataFile:MXRecord' => '
;
; Trocadores de e-mail (Mail exchangers)
;',
	'Class:Zone/DataFile:OPENPGPKEYRecord' => '
;
; Chaves públicas OpenPGP
;',
	'Class:Zone/DataFile:PTRRecord' => '
;
; Endereços apontam para nomes canônicos
;',
	'Class:Zone/DataFile:SRVRecord' => '
;
; Localizar serviços
;',
	'Class:Zone/DataFile:SSHFPRecord' => '
;
; Impressões digitais de chave pública SSH
;',
	'Class:Zone/DataFile:TLSARecord' => '
;
; Associações de certificado TLSA
;',
	'Class:Zone/DataFile:TXTRecord' => '
;
; Texto
;',
	'Class:Zone/DataFile:records_in_alphaorder' => '
;
; Outros registros em ordem alfabética
;',
));

//
// Class: lnkFunctionalCIToZone
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:lnkFunctionalCIToZone' => 'Vínculo Funcional CI / Zona',
	'Class:lnkFunctionalCIToZone+' => '',
	'Class:lnkFunctionalCIToZone/Name' => '%1$s / %2$s',
	'Class:lnkFunctionalCIToZone/Attribute:functionalci_id' => 'Servidor DNS',
	'Class:lnkFunctionalCIToZone/Attribute:functionalci_id+' => '',
	'Class:lnkFunctionalCIToZone/Attribute:functionalci_name' => 'Nome do Servidor DNS',
	'Class:lnkFunctionalCIToZone/Attribute:functionalci_name+' => '',
	'Class:lnkFunctionalCIToZone/Attribute:zone_id' => 'Zona',
	'Class:lnkFunctionalCIToZone/Attribute:zone_id+' => '',
	'Class:lnkFunctionalCIToZone/Attribute:zone_name' => 'Nome da Zona',
	'Class:lnkFunctionalCIToZone/Attribute:zone_name+' => '',
	'Class:lnkFunctionalCIToZone/Attribute:authority' => 'Autoridade',
	'Class:lnkFunctionalCIToZone/Attribute:authority+' => '',
	'Class:lnkFunctionalCIToZone/Attribute:authority/Value:master' => 'Mestre',
	'Class:lnkFunctionalCIToZone/Attribute:authority/Value:master+' => '',
	'Class:lnkFunctionalCIToZone/Attribute:authority/Value:slave' => 'Escravo',
	'Class:lnkFunctionalCIToZone/Attribute:authority/Value:slave+' => '',
	'Class:lnkFunctionalCIToZone/Attribute:authority/Value:hidden_master' => 'Mestre oculto',
	'Class:lnkFunctionalCIToZone/Attribute:authority/Value:hidden_mastermaster+' => '',
	'Class:lnkFunctionalCIToZone/Attribute:authority/Value:hidden_slave' => 'Escravo oculto',
	'Class:lnkFunctionalCIToZone/Attribute:authority/Value:hidden_slave+' => '',
));

//
// Class: ResourceRecord
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:ResourceRecord' => 'Registro de Recurso',
	'Class:ResourceRecord+' => 'Registro de Recurso DNS',
	'Class:ResourceRecord/Attribute:finalclass' => 'Tipo',
	'Class:ResourceRecord/Attribute:finalclass+' => '',
	'Class:ResourceRecord/Attribute:org_id' => 'Organização',
	'Class:ResourceRecord/Attribute:org_id+' => 'Organização à qual o registro pertence',
	'Class:ResourceRecord/Attribute:org_name' => 'Nome da Organização',
	'Class:ResourceRecord/Attribute:org_name+' => '',
	'Class:ResourceRecord/Attribute:name' => 'Nome do RR',
	'Class:ResourceRecord/Attribute:name+' => '',
	'Class:ResourceRecord/Attribute:comment' => 'Comentário',
	'Class:ResourceRecord/Attribute:comment+' => '',
	'Class:ResourceRecord/Attribute:zone_id' => 'Zona',
	'Class:ResourceRecord/Attribute:zone_id+' => 'Zona à qual o registro pertence',
	'Class:ResourceRecord/Attribute:zone_name' => 'Nome da Zona',
	'Class:ResourceRecord/Attribute:zone_name+' => '',
	'Class:ResourceRecord/Attribute:overwrite_zone_ttl' => 'Sobrescrever TTL da zona',
	'Class:ResourceRecord/Attribute:overwrite_zone_ttl+' => 'Sobrescrever ou não o TTL definido no nível da zona',
	'Class:ResourceRecord/Attribute:overwrite_zone_ttl/Value:no' => 'Não',
	'Class:ResourceRecord/Attribute:overwrite_zone_ttl/Value:no+' => '',
	'Class:ResourceRecord/Attribute:overwrite_zone_ttl/Value:yes' => 'Sim',
	'Class:ResourceRecord/Attribute:overwrite_zone_ttl/Value:yes+' => '',
	'Class:ResourceRecord/Attribute:ttl' => 'TTL',
	'Class:ResourceRecord/Attribute:ttl+' => 'Time To Live (Tempo de Vida)',
	'ResourceRecord:Zone' => 'Zona',
	'ResourceRecord:Record' => 'Atributos dos RRs',
));

//
// Class: ResourceRecordType
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:ResourceRecordType' => 'Tipo de Registro de Recurso',
	'Class:ResourceRecordType+' => 'Tipo de Registro de Recurso que não é coberto por uma classe dedicada',
	'Class:ResourceRecordType/Attribute:name' => 'Tipo',
	'Class:ResourceRecordType/Attribute:name+' => 'Tipo como aparece em um arquivo de DB',
	'Class:ResourceRecordType/Attribute:description' => 'Descrição',
	'Class:ResourceRecordType/Attribute:description+' => '',
));

//
// Class: ARecord
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:ARecord' => 'A',
	'Class:ARecord+' => 'Registro de Endereço IPv4',
	'Class:ARecord/Attribute:ip_id' => 'Endereço IPv4',
	'Class:ARecord/Attribute:ip_id+' => '',
	'Class:ARecord/Attribute:ip_fqdn' => 'FQDN do Endereço IPv4',
	'Class:ARecord/Attribute:ip_fqdn+' => '',
));

//
// Class: AAAARecord
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:AAAARecord' => 'AAAA',
	'Class:AAAARecord+' => 'Registro de Endereço IPv6',
	'Class:AAAARecord/Attribute:ip_id' => 'Endereço IPv6',
	'Class:AAAARecord/Attribute:ip_id+' => '',
	'Class:AAAARecord/Attribute:ip_fqdn' => 'FQDN do Endereço IPv6',
	'Class:AAAARecord/Attribute:ip_fqdn+' => '',
));

//
// Class: CAARecord
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:CAARecord' => 'CAA',
	'Class:CAARecord+' => 'Registro de Autorização da Autoridade de Certificação DNS',
	'Class:CAARecord/Attribute:flag' => 'Flag',
	'Class:CAARecord/Attribute:flag+' => 'Inteiro',
	'Class:CAARecord/Attribute:tag' => 'Tag',
	'Class:CAARecord/Attribute:tag+' => '',
	'Class:CAARecord/Attribute:tag/Value:issue' => 'Issue',
	'Class:CAARecord/Attribute:tag/Value:issue+' => '',
	'Class:CAARecord/Attribute:tag/Value:issuewild' => 'Issue Wild',
	'Class:CAARecord/Attribute:tag/Value:issuewild+' => '',
	'Class:CAARecord/Attribute:tag/Value:iodef' => 'Iodef',
	'Class:CAARecord/Attribute:tag/Value:iodef+' => '',
	'Class:CAARecord/Attribute:value' => 'Valor',
	'Class:CAARecord/Attribute:value+' => 'Strings associadas às tags.',
));

//
// Class: CNAMERecord
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:CNAMERecord' => 'CNAME',
	'Class:CNAMERecord+' => 'Registro de Nome Canônico',
	'Class:CNAMERecord/Attribute:cname' => 'Nome Canônico',
	'Class:CNAMERecord/Attribute:cname+' => 'Nome canônico ou nome verdadeiro',
));

//
// Class: DSRecord
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:DSRecord' => 'DS',
	'Class:DSRecord+' => 'Registro de Assinante de Delegação',
	'Class:DSRecord/Attribute:key_tag' => 'Tag da Chave',
	'Class:DSRecord/Attribute:key_tag+' => 'Um valor numérico curto que pode ajudar a identificar rapidamente o registro DNSKEY referenciado',
	'Class:DSRecord/Attribute:algorithm' => 'Algoritmo',
	'Class:DSRecord/Attribute:algorithm+' => 'O algoritmo do registro DNSKEY referenciado',
	'Class:DSRecord/Attribute:digest_type' => 'Tipo de Digest',
	'Class:DSRecord/Attribute:digest_type+' => 'Algoritmo de hash criptográfico usado para criar o valor do Digest',
	'Class:DSRecord/Attribute:digest' => 'Digest',
	'Class:DSRecord/Attribute:digest+' => 'Um valor de hash criptográfico do registro DNSKEY referenciado',
));

//
// Class: GenericRecord
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:GenericRecord' => 'GENÉRICO',
	'Class:GenericRecord+' => 'Registro Genérico',
	'Class:GenericRecord/Attribute:payload' => 'Payload',
	'Class:GenericRecord/Attribute:payload+' => 'Tudo o que o arquivo de db deve ver após a declaração do Registro de Recurso',
	'Class:GenericRecord/Attribute:rrtype_id' => 'Tipo',
	'Class:GenericRecord/Attribute:rrtype_id+' => 'Tipo de Registro de Recurso',
	'Class:GenericRecord/Attribute:rrtype_name' => 'Nome do tipo',
	'Class:GenericRecord/Attribute:rrtype_name+' => '',
));

//
// Class: MXRecord
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:MXRecord' => 'MX',
	'Class:MXRecord+' => 'Registro de Trocador de E-mail',
	'Class:MXRecord/Attribute:preference' => 'Preferência',
	'Class:MXRecord/Attribute:preference+' => 'Um inteiro que representa a preferência por um servidor de e-mail',
	'Class:MXRecord/Attribute:exchange' => 'Servidor de troca de e-mail',
	'Class:MXRecord/Attribute:exchange+' => 'O nome de domínio do servidor de e-mail',
));

//
// Class: NSRecord
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:NSRecord' => 'NS',
	'Class:NSRecord+' => 'Registro de Servidor de Nomes',
	'Class:NSRecord/Attribute:nsname' => 'Servidor de nomes',
	'Class:NSRecord/Attribute:nsname+' => 'O hostname do servidor de nomes',
));

//
// Class: OPENPGPKEYRecord
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:OPENPGPKEYRecord' => 'OPENPGPKEY',
	'Class:OPENPGPKEYRecord+' => 'Registro de Chave Pública OpenPGP',
	'Class:OPENPGPKEYRecord/Attribute:key' => 'Chave Pública OpenPGP',
	'Class:OPENPGPKEYRecord/Attribute:key+' => 'Uma Chave Pública Transferível OpenPGP',
));

//
// Class: PTRRecord
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:PTRRecord' => 'PTR',
	'Class:PTRRecord+' => 'Registro de Ponteiro',
	'Class:PTRRecord/Attribute:hostname' => 'Hostname',
	'Class:PTRRecord/Attribute:hostname+' => 'O nome do servidor associado ao endereço IP',
));

//
// Class: SOARecord
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:SOARecord' => 'SOA',
	'Class:SOARecord+' => 'Registro de Início de Autoridade',
	'Class:SOARecord/Attribute:sourcedname' => 'Servidor mestre',
	'Class:SOARecord/Attribute:sourcedname+' => '',
	'Class:SOARecord/Attribute:mbox' => 'Caixa de correio do Hostmaster',
	'Class:SOARecord/Attribute:mbox+' => '',
	'Class:SOARecord/Attribute:serial' => 'Serial',
	'Class:SOARecord/Attribute:serial+' => '',
	'Class:SOARecord/Attribute:refresh' => 'Atualização (Refresh)',
	'Class:SOARecord/Attribute:refresh+' => '',
	'Class:SOARecord/Attribute:retry' => 'Tentativa (Retry)',
	'Class:SOARecord/Attribute:retry+' => '',
	'Class:SOARecord/Attribute:expire' => 'Expiração (Expire)',
	'Class:SOARecord/Attribute:expire+' => '',
	'Class:SOARecord/Attribute:minimum' => 'Mínimo (Minimum)',
	'Class:SOARecord/Attribute:minimum+' => 'O TTL de resultado negativo',
));

//
// Class: SRVRecord
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:SRVRecord' => 'SRV',
	'Class:SRVRecord+' => 'Registro de Serviço',
	'Class:SRVRecord/Attribute:priority' => 'Prioridade',
	'Class:SRVRecord/Attribute:priority+' => 'Um inteiro que decide a prioridade deste host de destino',
	'Class:SRVRecord/Attribute:weight' => 'Peso',
	'Class:SRVRecord/Attribute:weight+' => 'Peso relativo para entradas com a mesma prioridade',
	'Class:SRVRecord/Attribute:port' => 'Porta',
	'Class:SRVRecord/Attribute:port+' => 'Porta TCP ou UDP onde o serviço especificado pode ser encontrado',
	'Class:SRVRecord/Attribute:target' => 'Destino',
	'Class:SRVRecord/Attribute:target+' => 'O nome de domínio do host de destino que fornecerá este serviço',
));

//
// Class: SSHFPRecord
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:SSHFPRecord' => 'SSHFP',
	'Class:SSHFPRecord+' => 'Registro de Impressão Digital Secure Shell',
	'Class:SSHFPRecord/Attribute:algorithm' => 'Algoritmo',
	'Class:SSHFPRecord/Attribute:algorithm+' => 'O algoritmo do registro SSHFP referenciado',
	'Class:SSHFPRecord/Attribute:type' => 'Tipo de Digest',
	'Class:SSHFPRecord/Attribute:type+' => 'Algoritmo de hash criptográfico usado para criar o valor do Digest',
	'Class:SSHFPRecord/Attribute:fingerprint' => 'Impressão Digital (Fingerprint)',
	'Class:SSHFPRecord/Attribute:fingerprint+' => 'A representação hexadecimal do valor de hash da chave SSH como texto',
));

//
// Class: TLSARecord
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:TLSARecord' => 'TLSA',
	'Class:TLSARecord+' => 'Registro de Associação de Certificado TLSA',
	'Class:TLSARecord/Attribute:certificate_usage' => 'Uso do Certificado',
	'Class:TLSARecord/Attribute:certificate_usage+' => 'Inteiro',
	'Class:TLSARecord/Attribute:selector' => 'Seletor',
	'Class:TLSARecord/Attribute:selector+' => 'Inteiro',
	'Class:TLSARecord/Attribute:matching_type' => 'Tipo de Correspondência',
	'Class:TLSARecord/Attribute:matching_type+' => 'Inteiro',
	'Class:TLSARecord/Attribute:data' => 'Dados de Associação de Certificado',
	'Class:TLSARecord/Attribute:data+' => 'Os dados reais a serem correspondidos dadas as configurações dos outros campos',
));

//
// Class: TXTRecord
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Class:TXTRecord' => 'TXT',
	'Class:TXTRecord+' => 'Registro de Texto',
	'Class:TXTRecord/Attribute:txt' => 'Texto',
	'Class:TXTRecord/Attribute:txt+' => 'Texto de formato livre de qualquer tipo',
	'Class:TXTRecord/Attribute:previous_segment_id' => 'Segmento anterior',
	'Class:TXTRecord/Attribute:previous_segment_id+' => 'Registro de Texto que contém o trecho anterior da string longa (> 255 bytes) que está segmentada entre este registro de texto e outros.',
	'Class:TXTRecord/Attribute:next_segment_id' => 'Próximo segmento',
	'Class:TXTRecord/Attribute:next_segment_id+' => 'Registro de Texto que contém o próximo trecho da string longa (> 255 bytes) que está segmentada entre este registro de texto e outros.',
	'TXTRecord:Chaining' => 'Encadeamento',
));

//
// Management of zones
//
Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'UI:ZoneManagement:Action:New:Zone:V4:WrongFormat' => 'Formato incorreto: o formato de zona reversa IPv4 é x.[y.][z.]in-addr.arpa. ou u-v.x.y.z.in-addr.arpa. !',
	'UI:ZoneManagement:Action:New:Zone:V6:WrongFormat' => 'Formato incorreto: o formato de zona reversa IPv6 é x1.[x2.]...[xi.]ip6.arpa. !',
	'UI:ZoneManagement:Action:New:lnkFunctionalCIToZone:WrongCIClass' => 'Um servidor autoritativo só pode ser da classe Servidor, Máquina Virtual, Dispositivo de Rede, Rede de Cluster ou Solução de Aplicação !',
));

//
// Management of data files
//
Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'UI:ZoneManagement:Action:DataFileDisplay:Zone' => 'Arquivo de dados',
	'UI:ZoneManagement:Action:DataFileDisplay:Zone:Menu' => 'Exibir arquivo de dados',
	'UI:ZoneManagement:Action:DataFileDisplay:Zone:PageTitle_Object_Class' => '%1$s - arquivo de dados %2$s',
	'UI:ZoneManagement:Action:DataFileDisplay:Zone:Title_Class_Object' => 'Arquivo de dados de %1$s: %2$s',
	'UI:ZoneManagement:Action:DataFileDisplay:Zone:sort_by_record' => 'Exibir arquivo de dados ordenado por registros',
	'UI:ZoneManagement:Action:DataFileDisplay:Zone:sort_by_char' => 'Exibir arquivo de dados ordenado por ordem alfabética',
	'UI:ZoneManagement:Action:Details:Zone:Menu' => 'Detalhes',
));

//
// Management of records
//
Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'UI:ZoneManagement:Action:New:PTRRecord:V4:WrongNumberOfDigit' => 'Formato incorreto: registros PTR IPv4 são compostos por 4/5 "números" - x.y.z.t.in-addr.arpa. / w.u-v.x.y.z.in-addr.arpa. !',
	'UI:ZoneManagement:Action:New:PTRRecord:V4:IPNotInZone' => 'O último dígito do PTR em uma zona de subclasse C deve pertencer ao intervalo definido pelos dígitos a seguir (w em [u,v] para w.u-v.x.y.z.in-addr.arpa.) !',
	'UI:ZoneManagement:Action:New:PTRRecord:V4:IpNotInRange' => 'Formato incorreto: os números IPv4 estão contidos no intervalo de 0 a 255!',
	'UI:ZoneManagement:Action:New:PTRRecord:V4:WrongFormat' => 'Formato incorreto: o formato de registros PTR IPv4 é x.y.z.t.in-addr.arpa. ou w.u-v.x.y.z.in-addr.arpa !',
	'UI:ZoneManagement:Action:New:PTRRecord:V6:WrongNumberOfDigit' => 'Formato incorreto: registros PTR IPv6 são compostos por 32 números - x1.x2....x32.ip6.arpa. !',
	'UI:ZoneManagement:Action:New:PTRRecord:V6:IpNotInRange' => 'Formato incorreto: os números IPv6 estão contidos no intervalo de 0 a F, em hexa!',
	'UI:ZoneManagement:Action:New:PTRRecord:V6:WrongFormat' => 'Formato incorreto: o formato de registros PTR IPv6 é x1.x2....x32.ip6.arpa. !',

	'UI:ZoneManagement:Action:IPObject:UpdateRR' => 'Criar / Atualizar RRs DNS',
	'UI:ZoneManagement:Action:IPObject:DeleteRR' => 'Excluir RRs DNS',

	'UI:ZoneManagement:Action:IPAddress:UpdateRR' => 'Criar / Atualizar RRs DNS',
	'UI:ZoneManagement:Action:IPAddress:UpdateRRs:Error:NoShortName' => 'O endereço IP não tem nome curto!',
	'UI:ZoneManagement:Action:IPAddress:UpdateRRs:Error:NoDomainName' => 'O endereço IP não tem nome de domínio!',
	'UI:ZoneManagement:Action:IPAddress:UpdateRRs:Error:CannotFindZone:direct' => 'Não foi possível encontrar a zona direta para o domínio e a view informados!',
	'UI:ZoneManagement:Action:IPAddress:UpdateRRs:Error:CannotFindZone:ipv4reverse' => 'Não foi possível encontrar a zona reversa!',
	'UI:ZoneManagement:Action:IPAddress:UpdateRRs:Error:CannotFindZone:ipv6reverse' => 'Não foi possível encontrar a zona reversa!',
	'UI:ZoneManagement:Action:IPAddress:UpdateRRs:HasNotRun' => 'Nenhum registro de recurso foi criado a partir do endereço: %1$s',
	'UI:ZoneManagement:Action:IPAddress:UpdateRRs:HasErrors' => 'Alguns erros foram encontrados: %1$s',
	'UI:ZoneManagement:Action:IPAddress:UpdateRRs:HasRun' => 'Os registros de recurso associados ao endereço IP foram criados ou atualizados.',
	'UI:ZoneManagement:Action:IPAddress:CleanRRs:HasRun' => 'Os registros de recurso associados ao endereço IP foram purgados.',
	'UI:ZoneManagement:Action:IPAddress:DeleteRR' => 'Excluir RRs DNS',

	'UI:ZoneManagement:Action:IPSubnet:UpdateRRs:HasNotRun' => 'Nenhum registro de recurso foi criado a partir da sub-rede: %1$s',
	'UI:ZoneManagement:Action:IPSubnet:UpdateRRs:HasRun' => 'Os registros de recurso associados aos endereços IP da sub-rede foram criados ou atualizados.',
	'UI:ZoneManagement:Action:IPSubnet:CleanRRs:HasRun' => 'Os registros de recurso associados aos endereços IP da sub-rede foram purgados.',
));

//
// Application Menu
//

Dict::Add('PT BR', 'Brazilian', 'Brazilian', array(
	'Menu:DNSManagement' => 'Gerenciamento de DNS',
	'Menu:DNSManagement+' => '',
	'Menu:NameSpace' => 'Espaço de Nomes',
	'Menu:NameSpace+' => 'Resumo de todos os objetos DNS',
	'Menu:DNSSpace:MainObjects' => 'Objetos Estruturais',
	'Title:Zones:DirectMapping' => 'Zonas Diretas',
	'Title:Zones:V4ReverseMapping' => 'Zonas Reversas IPv4',
	'Title:Zones:V6ReverseMapping' => 'Zonas Reversas IPv6',
	'Menu:DNSSpace:ResourceRecords' => 'Registros de Recurso Comuns',
	'Menu:DNSSpace:SecurityResourceRecords' => 'Registros de Recurso de Segurança',
	'Menu:DNSSpace:GenericResourceRecords' => 'Registros de Recurso Genéricos',
	'Menu:View' => 'Views',
	'Menu:View+' => 'Lista de todas as Views DNS',
	'Menu:Domain' => 'Domínios',
	'Menu:Domain+' => 'Lista de todos os Domínios DNS',
	'Menu:Zone' => 'Zonas',
	'Menu:Zone+' => 'Lista de todas as Zonas DNS',
	'Menu:ZoneManagement:ResourceRecords' => 'Registros de Recurso',
	'Menu:ZoneManagement:ResourceRecords+' => 'Registros de Recurso DNS',
	'Menu:NewResourceRecord' => 'Novo RR',
	'Menu:NewResourceRecord+' => 'Criar um novo Registro de Recurso DNS',
	'Menu:SearchResourceRecord' => 'Buscar RRs',
	'Menu:SearchResourceRecord+' => 'Buscar por Registros de Recurso DNS',
	'Menu:ARecord' => 'A',
	'Menu:ARecord+' => 'Lista de todos os Registros A',
	'Menu:AAAARecord' => 'AAAA',
	'Menu:AAAARecord+' => 'Lista de todos os Registros AAAA',
	'Menu:CAARecord' => 'CAA',
	'Menu:CAARecord+' => 'Lista de todos os Registros CAA',
	'Menu:CNAMERecord' => 'CNAME',
	'Menu:CNAMERecord+' => 'Lista de todos os Registros CNAME',
	'Menu:DSRecord' => 'DS',
	'Menu:DSRecord+' => 'Lista de todos os Registros DS',
	'Menu:MXRecord' => 'MX',
	'Menu:MXRecord+' => 'Lista de todos os Registros MX',
	'Menu:NSRecord' => 'NS',
	'Menu:NSRecord+' => 'Lista de todos os Registros NS',
	'Menu:OPENPGPKEYRecord' => 'OPENPGPKEY',
	'Menu:OPENPGPKEYRecord+' => 'Lista de todos os Registros OPENPGPKEY',
	'Menu:PTRRecord' => 'PTR',
	'Menu:PTRRecord+' => 'Lista de todos os Registros PTR',
	'Menu:SOARecord' => 'SOA',
	'Menu:SOARecord+' => 'Lista de todos os Registros SOA',
	'Menu:SRVRecord' => 'SRV',
	'Menu:SRVRecord+' => 'Lista de todos os Registros SRV',
	'Menu:SSHFPRecord' => 'SSHFP',
	'Menu:SSHFPRecord+' => 'Lista de todos os Registros SSHFP',
	'Menu:TLSARecord' => 'TLSA',
	'Menu:TLSARecord+' => 'Lista de todos os Registros TLSA',
	'Menu:TXTRecord' => 'TXT',
	'Menu:TXTRecord+' => 'Lista de todos os Registros TXT',
	'Menu:GenericRecord' => 'GENÉRICO',
	'Menu:GenericRecord+' => 'Lista de todos os Registros genéricos ou personalizados',
));
