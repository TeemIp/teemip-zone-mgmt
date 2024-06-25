<?php
/*
 * @copyright   Copyright (C) 2010-2024 TeemIp
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

//
// Class extensions for IPConfig
//

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:IPConfig/Attribute:ip_update_dns_records' => 'Mets à jour automatiquement les enregistrements DNS',
	'Class:IPConfig/Attribute:ip_update_dns_records+' => 'Crée, modifie ou supprime automatiquement les enregistrements DNS liés à une adresse IP',
	'Class:IPConfig/Attribute:ip_update_dns_records/Value:yes' => 'Oui',
	'Class:IPConfig/Attribute:ip_update_dns_records/Value:no' => 'Non',
	'Class:IPConfig/Attribute:remove_rr_on_ip_obsolete' => 'Enlève les enregistrements DNS des IPs obsolètes',
	'Class:IPConfig/Attribute:remove_rr_on_ip_obsolete+' => 'Supprime automatiquement les enregistrements DNS liés à une adresse IP obsolète',
	'Class:IPConfig/Attribute:remove_rr_on_ip_obsolete/Value:yes' => 'Oui',
	'Class:IPConfig/Attribute:remove_rr_on_ip_obsolete/Value:no' => 'Non',
    'Class:IPConfig/Attribute:serial_update_method' => 'Méthode de mise à jour du serial',
    'Class:IPConfig/Attribute:serial_update_method+' => 'Méthode utilisée pour mettre à jour le numéro de série de la zone',
    'Class:IPConfig/Attribute:serial_update_method/Value:increment_by_one' => 'Increment de un',
    'Class:IPConfig/Attribute:serial_update_method/Value:set_date' => 'Date, au format ISO 8601 basic, suivi par un compteur sur 2 chiffres',
    'Class:IPConfig/Attribute:serial_update_method/Value:set_ux_time' => 'Date exprimée en nombre de secondes depuis l\'époque UNIX',
));

//
// Class extensions for IPAddress
//

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:IPAddress/Attribute:view_id' => 'Vue DNS',
	'Class:IPAddress/Attribute:view_id+' => 'Vue DNS depuis laquelle l\'IP est résolue',
	'Class:IPAddress/Attribute:view_name' => 'Nom de la Vue',
	'Class:IPAddress/Attribute:view_name+' => '',
	'Class:IPAddress/Tab:rrecords_list' => 'Enregistrements DNS',
	'Class:IPAddress/Tab:rrecords_list+' => 'Liste de tous les enregistrements DNS associés à l\'addesse IP.',
	'Class:IPAddress/Tab:ptrrecords_list' => 'Enregistrements PTR associés à l\'addesse IP',
	'Class:IPAddress/Tab:ptrrecords_list_empty' => 'Il n\'y a pas d\'enregistrements PTR liés à cette IP',
	'Class:IPAddress/Tab:arecords_list' => 'Enregistrements A associés à l\'addesse IP',
	'Class:IPAddress/Tab:arecords_list_empty' => 'Il n\'y a pas d\'enregistrements A liés à cette IP',
	'Class:IPAddress/Tab:aaaarecords_list' => 'Enregistrements AAAA associés à l\'addesse IP',
	'Class:IPAddress/Tab:aaaarecords_list_empty' => 'Il n\'y a pas d\'enregistrements AAAA liés à cette IP',
	'Class:IPAddress/Tab:cnamerecords_list' => 'Enregistrements CNAME associés à l\'addesse IP',
	'Class:IPAddress/Tab:cnamerecords_list_empty' => 'Il n\'y a pas d\'enregistrements CNAME liés à cette IP',
));

//
// Class extensions for IPSubnet
//

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:IPSubnet/Tab:rrecords_list' => 'Enregistrements DNS',
	'Class:IPSubnet/Tab:rrecords_list+' => 'Liste de tous les enregistrements DNS associés au sous-réseau.',
	'Class:IPSubnet/Tab:ptrrecords_list' => 'Enregistrements PTR associés au sous-réseau',
	'Class:IPSubnet/Tab:ptrrecords_list_empty' => 'Il n\'y a pas d\'enregistrements PTR liés au sous-réseau',
	'Class:IPSubnet/Tab:arecords_list' => 'Enregistrements A associés au sous-réseau',
	'Class:IPSubnet/Tab:arecords_list_empty' => 'Il n\'y a pas d\'enregistrements A liés au sous-réseau',
	'Class:IPSubnet/Tab:aaaarecords_list' => 'Enregistrements AAAA associés au sous-réseau',
	'Class:IPSubnet/Tab:aaaarecords_list_empty' => 'Il n\'y a pas d\'enregistrements AAAA liés au sous-réseau',
	'Class:IPSubnet/Tab:cnamerecords_list' => 'Enregistrements CNAME associés au sous-réseau',
	'Class:IPSubnet/Tab:cnamerecords_list_empty' => 'Il n\'y a pas d\'enregistrements CNAME liés au sous-réseau',
));

//
// Class: View
//

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:View' => 'Vue',
	'Class:View+' => 'Vue DNS',
	'Class:View/Attribute:org_id' => 'Organisation',
	'Class:View/Attribute:org_id+' => 'Organization à laquelle appartient la Vue',
	'Class:View/Attribute:org_name' => 'Nom de l\'organisation',
	'Class:View/Attribute:org_name+' => '',
	'Class:View/Attribute:name' => 'Nom',
	'Class:View/Attribute:name+' => '',
	'Class:View/Attribute:description' => 'Description',
	'Class:View/Attribute:description+' => '',
	'Class:View/Attribute:zones_list' => 'Zones',
	'Class:View/Attribute:zones_list+' => 'Toutes les zones de la vue',
));

//
// Class: Zone
//

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:Zone' => 'Zone',
	'Class:Zone+' => 'Zone DNS',
	'Class:Zone/Name' => '%1$s',
	'Class:Zone:baseinfo' => 'Information Générale',
	'Class:Zone:soainfo' => 'Start Of Authority',
	'Class:Zone/Attribute:view_id' => 'Vue',
	'Class:Zone/Attribute:view_id+' => 'Vue à laquelle appartient la zone',
	'Class:Zone/Attribute:mapping' => 'Type de Mapping',
	'Class:Zone/Attribute:mapping+' => 'Type de résolution fournie par la zone: forward, reverse pour adresses IPv4 ou reverse pour les adresses IPv6',
	'Class:Zone/Attribute:mapping/Value:direct' => 'Forward',
	'Class:Zone/Attribute:mapping/Value:direct+' => 'Forward mapping',
	'Class:Zone/Attribute:mapping/Value:ipv4reverse' => 'IPv4 Inverse',
	'Class:Zone/Attribute:mapping/Value:ipv4reverse+' => 'Mapping inverse pour les adresses IPv4: IPv4 vers nom',
	'Class:Zone/Attribute:mapping/Value:ipv6reverse' => 'IPv6 Inverse',
	'Class:Zone/Attribute:mapping/Value:ipv6reverse+' => 'Mapping inverse pour les adresses IPv6: IPv6 vers nom',
	'Class:Zone/Attribute:name' => 'Nom',
	'Class:Zone/Attribute:name+' => '',
	'Class:Zone/Attribute:comment' => 'Commentaire',
	'Class:Zone/Attribute:comment+' => '',
	'Class:Zone/Attribute:requestor_id' => 'Demandeur',
	'Class:Zone/Attribute:requestor_id+' => 'Personne ayant demandé la création ou la modification de la zone',
	'Class:Zone/Attribute:requestor_name' => 'Nom du demandeur',
	'Class:Zone/Attribute:requestor_name+' => '',
	'Class:Zone/Attribute:ttl' => 'TTL',
	'Class:Zone/Attribute:ttl+' => 'Time To Live',
	'Class:Zone/Attribute:sourcedname' => 'Master server',
	'Class:Zone/Attribute:sourcedname+' => '',
	'Class:Zone/Attribute:mbox' => 'Hostmaster mailbox',
	'Class:Zone/Attribute:mbox+' => '',
	'Class:Zone/Attribute:serial' => 'Serial',
	'Class:Zone/Attribute:serial+' => '',
	'Class:Zone/Attribute:refresh' => 'Refresh',
	'Class:Zone/Attribute:refresh+' => '',
	'Class:Zone/Attribute:retry' => 'Retry',
	'Class:Zone/Attribute:retry+' => '',
	'Class:Zone/Attribute:expire' => 'Expire',
	'Class:Zone/Attribute:expire+' => '',
	'Class:Zone/Attribute:minimum' => 'Minimum',
	'Class:Zone/Attribute:minimum+' => '',
	'Class:Zone/Attribute:functionalcis_list' => 'Serveurs autoritaires',
	'Class:Zone/Attribute:functionalcis_list+' => 'Serveurs autoritaires en charge de la zone',
	'Class:Zone/Tab:nsrecords_list' => 'Enregistrements NS',
	'Class:Zone/Tab:nsrecords_list+' => 'Liste de tous les enregistrements NS de la zone',
	'Class:Zone/Tab:arecords_list' => 'Enregistrements A',
	'Class:Zone/Tab:arecords_list+' => 'Liste de tous les enregistrements A de la zone',
	'Class:Zone/Tab:aaaarecords_list' => 'Enregistrements AAAA',
	'Class:Zone/Tab:aaaarecords_list+' => 'Liste de tous les enregistrements AAAA de la zone',
	'Class:Zone/Tab:cnamerecords_list' => 'Enregistrements CNAME',
	'Class:Zone/Tab:cnamerecords_list+' => 'Liste de tous les enregistrements CNAME de la zone',
	'Class:Zone/Tab:ptrrecords_list' => 'Enregistrements PTR',
	'Class:Zone/Tab:ptrrecords_list+' => 'Liste de tous les enregistrements PTR de la zone',
	'Class:Zone/Tab:otherrecords_list' => 'Autres enregistrements',
	'Class:Zone/Tab:otherrecords_list+' => 'Liste de tous les autres enregistrements de la zone',
	'Class:Zone/Tab:records_list' => 'Liste de tous les enregistrements %1$s de la zone',
	'Class:Zone/Tab:records_list_empty' => 'Il n\'y a pas d\'enregistrement %1$s dans la zone',
	'Class:Zone/DataFile:NSRecord' => '
;
; Serveurs de Noms
;',
	'Class:Zone/DataFile:ARecord' => '
;
; Adresses IPv4 pour les noms canoniques
;',
	'Class:Zone/DataFile:AAAARecord' => '
;
; Adresses IPv6 pour les noms canoniques
;',
	'Class:Zone/DataFile:CAARecord' => '
;
; Certification Authority Authorization
;',
	'Class:Zone/DataFile:CNAMERecord' => '
;
; Aliases
;',
	'Class:Zone/DataFile:DSRecord' => '
;
; Delegation Signers
;',
	'Class:Zone/DataFile:GenericRecord' => '
;
; Autres enregistrements
;',
	'Class:Zone/DataFile:MXRecord' => '
;
; Mail exchangers
;',
	'Class:Zone/DataFile:OPENPGPKEYRecord' => '
;
; Clefs publiques OpenPGP
;',
	'Class:Zone/DataFile:PTRRecord' => '
;
; Adresses pointant vers des noms canoniques
;',
	'Class:Zone/DataFile:SRVRecord' => '
;
; Localisation des services
;',
	'Class:Zone/DataFile:SSHFPRecord' => '
;
; Empruntes de clefs publiques SSH
;',
	'Class:Zone/DataFile:TLSARecord' => '
;
; TLSA certificate associations
;',
	'Class:Zone/DataFile:TXTRecord' => '
;
; Texte
;',
	'Class:Zone/DataFile:records_in_alphaorder' => '
;
; Autres enregistrements triés par ordre alphabetique
;',
));

//
// Class: lnkFunctionalCIToZone
//

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:lnkFunctionalCIToZone' => 'Lien Serveur / Zone',
	'Class:lnkFunctionalCIToZone+' => '',
	'Class:lnkFunctionalCIToZone/Attribute:functionalci_id' => 'Serveur DNS',
	'Class:lnkFunctionalCIToZone/Attribute:functionalci_id+' => '',
	'Class:lnkFunctionalCIToZone/Attribute:functionalci_name' => 'Nom du serveur DNS',
	'Class:lnkFunctionalCIToZone/Attribute:functionalci_name+' => '',
	'Class:lnkFunctionalCIToZone/Attribute:zone_id' => 'Zone',
	'Class:lnkFunctionalCIToZone/Attribute:zone_id+' => '',
	'Class:lnkFunctionalCIToZone/Attribute:zone_name' => 'Nom de la zone',
	'Class:lnkFunctionalCIToZone/Attribute:zone_name+' => '',
	'Class:lnkFunctionalCIToZone/Attribute:authority' => 'Relation d\'autorité',
	'Class:lnkFunctionalCIToZone/Attribute:authority+' => '',
	'Class:lnkFunctionalCIToZone/Attribute:authority/Value:master' => 'Maître',
	'Class:lnkFunctionalCIToZone/Attribute:authority/Value:master+' => '',
	'Class:lnkFunctionalCIToZone/Attribute:authority/Value:slave' => 'Esclave',
	'Class:lnkFunctionalCIToZone/Attribute:authority/Value:slave+' => '',
	'Class:lnkFunctionalCIToZone/Attribute:authority/Value:hidden_master' => 'Maître caché',
	'Class:lnkFunctionalCIToZone/Attribute:authority/Value:hidden_mastermaster+' => '',
	'Class:lnkFunctionalCIToZone/Attribute:authority/Value:hidden_slave' => 'Esclave caché',
	'Class:lnkFunctionalCIToZone/Attribute:authority/Value:hidden_slave+' => '',
));

//
// Class: ResourceRecord
//

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:ResourceRecord' => 'Enregistrement',
	'Class:ResourceRecord+' => 'Enregistrement DNS',
	'Class:ResourceRecord/Attribute:finalclass' => 'Type',
	'Class:ResourceRecord/Attribute:finalclass+' => '',
	'Class:ResourceRecord/Attribute:org_id' => 'Organisation',
	'Class:ResourceRecord/Attribute:org_id+' => 'Organisation à laquelle appartient l\'enregistrement',
	'Class:ResourceRecord/Attribute:org_name' => 'Nom de l\'organisation',
	'Class:ResourceRecord/Attribute:org_name+' => '',
	'Class:ResourceRecord/Attribute:name' => 'Nom du RR',
	'Class:ResourceRecord/Attribute:name+' => '',
	'Class:ResourceRecord/Attribute:comment' => 'Commentaire',
	'Class:ResourceRecord/Attribute:comment+' => '',
	'Class:ResourceRecord/Attribute:zone_id' => 'Zone',
	'Class:ResourceRecord/Attribute:zone_id+' => 'Zone à laquelle appartient l\'enregistrement',
	'Class:ResourceRecord/Attribute:zone_name' => 'Nom de la zone',
	'Class:ResourceRecord/Attribute:zone_name+' => '',
	'Class:ResourceRecord/Attribute:overwrite_zone_ttl' => 'Surcharge du TTL de la zone',
	'Class:ResourceRecord/Attribute:overwrite_zone_ttl+' => 'Surcharge, ou pas, le TTL défini au niveau de la zone',
	'Class:ResourceRecord/Attribute:overwrite_zone_ttl/Value:no' => 'Non',
	'Class:ResourceRecord/Attribute:overwrite_zone_ttl/Value:no+' => '',
	'Class:ResourceRecord/Attribute:overwrite_zone_ttl/Value:yes' => 'Oui',
	'Class:ResourceRecord/Attribute:overwrite_zone_ttl/Value:yes+' => '',
	'Class:ResourceRecord/Attribute:ttl' => 'TTL',
	'Class:ResourceRecord/Attribute:ttl+' => 'Time To Live',
	'ResourceRecord:Zone' => 'Zone',
	'ResourceRecord:Record' => 'Attributs de l\'enregistrement',
));

//
// Class: ResourceRecordType
//

Dict::Add('EN US', 'English', 'English', array(
	'Class:ResourceRecordType' => 'Type de Resource Record',
	'Class:ResourceRecordType+' => 'Type de Resource Record qui n\'est pas couvert par une classe existante',
	'Class:ResourceRecordType/Attribute:name' => 'Type',
	'Class:ResourceRecordType/Attribute:name+' => 'Type tel qu\'il apparaît dans un fichier DB',
	'Class:ResourceRecordType/Attribute:description' => 'Description',
	'Class:ResourceRecordType/Attribute:description+' => '',
));

//
// Class: ARecord
//

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:ARecord' => 'A',
	'Class:ARecord+' => 'Enregistrement des adresses de type IPv4',
	'Class:ARecord/Attribute:ip_id' => 'Adresse IPv4',
	'Class:ARecord/Attribute:ip_id+' => '',
	'Class:ARecord/Attribute:ip_fqdn' => 'FQDN de l\'adresse IPv4',
	'Class:ARecord/Attribute:ip_fqdn+' => '',
));

//
// Class: AAAARecord
//

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:AAAARecord' => 'AAAA',
	'Class:AAAARecord+' => 'Enregistrement des adresses de type IPv6',
	'Class:AAAARecord/Attribute:ip_id' => 'Adresse IPv6',
	'Class:AAAARecord/Attribute:ip_id+' => '',
	'Class:AAAARecord/Attribute:ip_fqdn' => 'FQDN de l\'adresse IPv6',
	'Class:AAAARecord/Attribute:ip_fqdn+' => '',
));

//
// Class: CAARecord
//

Dict::Add('EN US', 'English', 'English', array(
	'Class:CAARecord' => 'CAA',
	'Class:CAARecord+' => 'Certification Authority Authorization',
	'Class:CAARecord/Attribute:flag' => 'Flag',
	'Class:CAARecord/Attribute:flag+' => 'Entier',
	'Class:CAARecord/Attribute:tag' => 'Tag',
	'Class:CAARecord/Attribute:tag+' => '',
	'Class:CAARecord/Attribute:tag/Value:issue' => 'Issue',
	'Class:CAARecord/Attribute:tag/Value:issue+' => '',
	'Class:CAARecord/Attribute:tag/Value:issuewild' => 'Issue Wild',
	'Class:CAARecord/Attribute:tag/Value:issuewild+' => '',
	'Class:CAARecord/Attribute:tag/Value:iodef' => 'Iodef',
	'Class:CAARecord/Attribute:tag/Value:iodef+' => '',
	'Class:CAARecord/Attribute:value' => 'Valeur',
	'Class:CAARecord/Attribute:value+' => 'Chaine de texte associée au Tag',
));

//
// Class: CNAMERecord
//

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:CNAMERecord' => 'CNAME',
	'Class:CNAMERecord+' => 'Enregistrement des noms canoniques',
	'Class:CNAMERecord/Attribute:cname' => 'CNAME',
	'Class:CNAMERecord/Attribute:cname+' => 'Nom canonique',
));

//
// Class: DSRecord
//

Dict::Add('EN US', 'English', 'English', array(
	'Class:DSRecord' => 'DS',
	'Class:DSRecord+' => 'Delegation Signer Record',
	'Class:DSRecord/Attribute:key_tag' => 'Key Tag',
	'Class:DSRecord/Attribute:key_tag+' => 'Valeur numérique pouvant aider à identifier rapidement l\'enregistrement DNSKEY référencé',
	'Class:DSRecord/Attribute:algorithm' => 'Algorithme',
	'Class:DSRecord/Attribute:algorithm+' => 'Algorithme utilisé par l\'enregistrement DNSKEY référencé',
	'Class:DSRecord/Attribute:digest_type' => 'Digest Type',
	'Class:DSRecord/Attribute:digest_type+' => 'Algorithme de hachage cryptographique utilisé pour créer la valeur de Digest',
	'Class:DSRecord/Attribute:digest' => 'Digest',
	'Class:DSRecord/Attribute:digest+' => 'Valeur du hachage cryptographique de l\'enregistrement DNSKEY référencé',
));

//
// Class: GenericRecord
//

Dict::Add('EN US', 'English', 'English', array(
	'Class:GenericRecord' => 'GENERIC',
	'Class:GenericRecord+' => 'Enregistrement générique',
	'Class:GenericRecord/Attribute:payload' => 'Payload',
	'Class:GenericRecord/Attribute:payload+' => 'All what the db file should see behind Resource Record statement',
	'Class:GenericRecord/Attribute:rrtype_id' => 'Type',
	'Class:GenericRecord/Attribute:rrtype_id+' => 'Type d\'enregistrement',
	'Class:GenericRecord/Attribute:rrtype_name' => 'Nom du type',
	'Class:GenericRecord/Attribute:rrtype_name+' => '',
));

//
// Class: MXRecord
//

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:MXRecord' => 'MX',
	'Class:MXRecord+' => 'Enregistrement des serveurs de courrier',
	'Class:MXRecord/Attribute:preference' => 'Préférence',
	'Class:MXRecord/Attribute:preference+' => '',
	'Class:MXRecord/Attribute:exchange' => 'Serveur de courrier',
	'Class:MXRecord/Attribute:exchange+' => '',
));

//
// Class: NSRecord
//

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:NSRecord' => 'NS',
	'Class:NSRecord+' => 'Enregistrement des serveurs de nom',
	'Class:NSRecord/Attribute:nsname' => 'Serveur de nom',
	'Class:NSRecord/Attribute:nsname+' => '',
));

//
// Class: OPENPGPKEYRecord
//

Dict::Add('EN US', 'English', 'English', array(
	'Class:OPENPGPKEYRecord' => 'OPENPGPKEY',
	'Class:OPENPGPKEYRecord+' => 'Clef publique OpenPGP',
	'Class:OPENPGPKEYRecord/Attribute:key' => 'Clef publique OpenPGP',
	'Class:OPENPGPKEYRecord/Attribute:key+' => 'Valeur de la clef publique OpenPGP transférable',
));

//
// Class: PTRRecord
//

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:PTRRecord' => 'PTR',
	'Class:PTRRecord+' => 'Enregistrement de type pointeur',
	'Class:PTRRecord/Attribute:hostname' => 'Nom du host',
	'Class:PTRRecord/Attribute:hostname+' => '',
));

//
// Class: SOARecord
//

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:SOARecord' => 'SOA',
	'Class:SOARecord+' => 'Enregistrement des données de zone',
	'Class:SOARecord/Attribute:sourcedname' => 'Serveur Maître',
	'Class:SOARecord/Attribute:sourcedname+' => '',
	'Class:SOARecord/Attribute:mbox' => 'Adresse mail',
	'Class:SOARecord/Attribute:mbox+' => '',
	'Class:SOARecord/Attribute:serial' => 'Numéro de série',
	'Class:SOARecord/Attribute:serial+' => '',
	'Class:SOARecord/Attribute:refresh' => 'Refresh',
	'Class:SOARecord/Attribute:refresh+' => '',
	'Class:SOARecord/Attribute:retry' => 'Retry',
	'Class:SOARecord/Attribute:retry+' => '',
	'Class:SOARecord/Attribute:expire' => 'Expire',
	'Class:SOARecord/Attribute:expire+' => '',
	'Class:SOARecord/Attribute:minimum' => 'Minimum',
	'Class:SOARecord/Attribute:minimum+' => '',
));

//
// Class: SRVRecord
//

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:SRVRecord' => 'SRV',
	'Class:SRVRecord+' => 'Enregistrement des services',
	'Class:SRVRecord/Attribute:priority' => 'Priorité',
	'Class:SRVRecord/Attribute:priority+' => '',
	'Class:SRVRecord/Attribute:weight' => 'Poids',
	'Class:SRVRecord/Attribute:weight+' => '',
	'Class:SRVRecord/Attribute:port' => 'Port',
	'Class:SRVRecord/Attribute:port+' => '',
	'Class:SRVRecord/Attribute:target' => 'Cible',
	'Class:SRVRecord/Attribute:target+' => '',
));

//
// Class: SSHFPRecord
//

Dict::Add('EN US', 'English', 'English', array(
	'Class:SSHFPRecord' => 'SSHFP',
	'Class:SSHFPRecord+' => 'Enregistrement Secure SHell Fingerprint',
	'Class:SSHFPRecord/Attribute:algorithm' => 'Algorithme',
	'Class:SSHFPRecord/Attribute:algorithm+' => 'Algorithme utilisé par l\'enregistrement SSHFP',
	'Class:SSHFPRecord/Attribute:type' => 'Digest Type',
	'Class:SSHFPRecord/Attribute:type+' => 'Algorithme de hachage cryptographique utilisé pour créer la valeur de Digest',
	'Class:SSHFPRecord/Attribute:fingerprint' => 'Emprunte',
	'Class:SSHFPRecord/Attribute:fingerprint+' => 'Représentation hexadécimale de la valeur de hachage de la clé SSH',
));

//
// Class: TLSARecord
//

Dict::Add('EN US', 'English', 'English', array(
	'Class:TLSARecord' => 'TLSA',
	'Class:TLSARecord+' => 'Enregistrement TLSA Certificate Association',
	'Class:TLSARecord/Attribute:certificate_usage' => 'Utilisation du certificat',
	'Class:TLSARecord/Attribute:certificate_usage+' => 'Entier',
	'Class:TLSARecord/Attribute:selector' => 'Selecteur',
	'Class:TLSARecord/Attribute:selector+' => 'Entier',
	'Class:TLSARecord/Attribute:matching_type' => 'Matching Type',
	'Class:TLSARecord/Attribute:matching_type+' => 'Entier',
	'Class:TLSARecord/Attribute:data' => 'Certificate Association Data',
	'Class:TLSARecord/Attribute:data+' => 'Données réelles à mettre en correspondance des autres champs',
));

//
// Class: TXTRecord
//

Dict::Add('FR FR', 'French', 'Français', array(
	'Class:TXTRecord' => 'TXT',
	'Class:TXTRecord+' => 'Enregistrement texte',
	'Class:TXTRecord/Attribute:txt' => 'Text',
	'Class:TXTRecord/Attribute:txt+' => '',
	'Class:TXTRecord/Attribute:previous_segment_id' => 'Segment précédent',
	'Class:TXTRecord/Attribute:previous_segment_id+' => 'Enregistrement texte qui contient la partie précédente de la longue châine de texte (> 255 octets) qui est segmentée dans cet enregistrement texte et d\'autres.',
	'Class:TXTRecord/Attribute:next_segment_id' => 'Segment suivant',
	'Class:TXTRecord/Attribute:next_segment_id+' => 'Enregistrement texte qui contient la partie suivante de la longue châine de texte (> 255 octets) qui est segmentée dans cet enregistrement texte et d\'autres.',
	'TXTRecord:Chaining' => 'Chainâge',
));

//
// Management of zones
//
Dict::Add('FR FR', 'French', 'Français', array(
	'UI:ZoneManagement:Action:New:Zone:V4:WrongFormat' => 'Mauvais format: le format d\'une zone reverse IPv4 est x.[y.][z.]in-addr.arpa. ou u-v.x.y.z.in-addr.arpa. !',
	'UI:ZoneManagement:Action:New:Zone:V6:WrongFormat' => 'Mauvais format: le format d\'une zone reverse IPv6 est x1.[x2.]...[x31.]ip6.arpa. !',
	'UI:ZoneManagement:Action:New:lnkFunctionalCIToZone:WrongCIClass' => 'Un serveur authoritaire ne peut être que de classe Serveur, Machine Virtuelle, Equipement réseau, Cluster réseau ou Solution Applicative !',
));

//
// Management of data files
//
Dict::Add('FR FR', 'French', 'Français', array(
	'UI:ZoneManagement:Action:DataFileDisplay:Zone' => 'Fichier de données',
	'UI:ZoneManagement:Action:DataFileDisplay:Zone:Menu' => 'Affiche le fichier de données',
	'UI:ZoneManagement:Action:DataFileDisplay:Zone:PageTitle_Object_Class' => '%1$s - %2$s fichier de données',
	'UI:ZoneManagement:Action:DataFileDisplay:Zone:Title_Class_Object' => 'Fichier de données de %1$s: %2$s',
	'UI:ZoneManagement:Action:DataFileDisplay:Zone:sort_by_record' => 'Affiche le fichier de données trié par enregistrements',
	'UI:ZoneManagement:Action:DataFileDisplay:Zone:sort_by_char' => 'Affiche le fichier de données trié par ordre alphabétique',
	'UI:ZoneManagement:Action:Details:Zone:Menu' => 'Détails',
));

//
// Management of records
//
Dict::Add('FR FR', 'French', 'Français', array(
	'UI:ZoneManagement:Action:New:PTRRecord:V4:WrongNumberOfDigit' => 'Mauvais format: les enregistrements PTR IPv4 sont constitués de 4 / 5 nombres - x.y.z.t.in-addr.arpa. / w.u-v.x.y.z.in-addr.arpa. !',
	'UI:ZoneManagement:Action:New:PTRRecord:V4:IPNotInZone' => 'Dans une zone relative à un sous class C, le dernier nombre d\'un enregistrement PTR doit appartenir à l\'intervalle définit par le nombre suivant (w dans [u,v] pour w.u-v.x.y.z.in-addr.arpa.) !',
	'UI:ZoneManagement:Action:New:PTRRecord:V4:IpNotInRange' => 'Mauvais format: les nombres IPv4 sont contenus dans l\'interval 0 - 255 !',
	'UI:ZoneManagement:Action:New:PTRRecord:V4:WrongFormat' => 'Mauvais format: le format des enregistrements PTR IPv4 est x.y.z.t.in-addr.arpa. ou w.u-v.x.y.z.in-addr.arpa !',
	'UI:ZoneManagement:Action:New:PTRRecord:V6:WrongNumberOfDigit' => 'Mauvais format: les enregistrements PTR IPv6 PTR sont constitués de 32 nombres - x1.x2....x32.ip6.arpa. !',
	'UI:ZoneManagement:Action:New:PTRRecord:V6:IpNotInRange' => 'Mauvais format: les nombres IPv6 sont contenus dans l\'interval 0 - F range, en hexa !',
	'UI:ZoneManagement:Action:New:PTRRecord:V6:WrongFormat' => 'Mauvais format: le format des enregistrements PTR IPv6 est x1.x2....x32.ip6.arpa. !',

	'UI:ZoneManagement:Action:IPObject:UpdateRR' => 'Créer / Modifier DNS RRs',
	'UI:ZoneManagement:Action:IPObject:DeleteRR' => 'Supprimer DNS RRs',

	'UI:ZoneManagement:Action:IPAddress:UpdateRR' => 'Créer / Modifier DNS RRs',
	'UI:ZoneManagement:Action:IPAddress:UpdateRRs:Error:NoShortName' => 'L\'addresse IP n\'a pas de nom court !',
	'UI:ZoneManagement:Action:IPAddress:UpdateRRs:Error:NoDomainName' => 'L\'addresse IP n\'a pas de nom de domaine !',
	'UI:ZoneManagement:Action:IPAddress:UpdateRRs:Error:CannotFindZone:direct' => 'Aucune zone forward n\'a été trouvée pour le domaine et la vue !',
	'UI:ZoneManagement:Action:IPAddress:UpdateRRs:Error:CannotFindZone:ipv4reverse' => 'Aucune zone reverse n\'a été trouvée !',
	'UI:ZoneManagement:Action:IPAddress:UpdateRRs:Error:CannotFindZone:ipv6reverse' => 'Aucune zone reverse n\'a été trouvée !',
	'UI:ZoneManagement:Action:IPAddress:UpdateRRs:HasNotRun' => 'Aucun enregistrement n\'a été créé pour l\'addresse: %1$s',
	'UI:ZoneManagement:Action:IPAddress:UpdateRRs:HasErrors' => 'Des  erreurs on tété trouvées: %1$s',
	'UI:ZoneManagement:Action:IPAddress:UpdateRRs:HasRun' => 'Les enregistrements associés à l\'addresse IP ont été créés ou mis à jour.',
	'UI:ZoneManagement:Action:IPAddress:CleanRRs:HasRun' => 'Les enregistrements associés à l\'adresse IP ont été supprimés.',
	'UI:ZoneManagement:Action:IPAddress:DeleteRR' => 'Supprimer DNS RRs',

	'UI:ZoneManagement:Action:IPSubnet:UpdateRRs:HasNotRun' => 'Aucun enregistrement n\'a été créé pour le sous-réseau: %1$s',
	'UI:ZoneManagement:Action:IPSubnet:UpdateRRs:HasRun' => 'Les enregistrements associés aux adresses contenues dans le sous-réseau ont été créés ou mis à jour.',
	'UI:ZoneManagement:Action:IPSubnet:CleanRRs:HasRun' => 'Les enregistrements associés aux adresses contenues dans le sous-réseau ont été supprimés.',
));

//
// Application Menu
//

Dict::Add('FR FR', 'French', 'Français', array(
	'Menu:DNSManagement' => 'Gestion du DNS',
	'Menu:DNSManagement+' => '',
	'Menu:NameSpace' => 'Espace de Nomage',
	'Menu:NameSpace+' => 'Résumé de tous les objets DNS ',
	'Menu:DNSSpace:MainObjects' => 'Objets structurants',
	'Title:Zones:DirectMapping' => 'Zones forward',
	'Title:Zones:V4ReverseMapping' => 'Zones IPv4 inverse',
	'Title:Zones:V6ReverseMapping' => 'Zones IPv6 inverse',
	'Menu:DNSSpace:ResourceRecords' => 'Enregistrements',
	'Menu:DNSSpace:SecurityResourceRecords' => 'Enregistrements de sécurité',
	'Menu:DNSSpace:GenericResourceRecords' => 'Enregistrements génériques',
	'Menu:View' => 'Vues',
	'Menu:View+' => 'Liste de toutes les vues DNS',
	'Menu:Domain' => 'Domaines',
	'Menu:Domain+' => 'Liste de tous les domaines DNS',
	'Menu:Zone' => 'Zones',
	'Menu:Zone+' => 'Liste de toutes les zones DNS',
	'Menu:DNSManagement:ResourceRecords' => 'Enregistrements',
	'Menu:DNSManagement:ResourceRecords+' => 'Enregistrements DNS',
	'Menu:NewResourceRecord' => 'Nouveau RR',
	'Menu:NewResourceRecord+' => 'Créer un nouvel enregistrement DNS',
	'Menu:SearchResourceRecord' => 'Recherche de RRs',
	'Menu:SearchResourceRecord+' => 'Recherche d\'enregistrements DNS',
	'Menu:ARecord' => 'A',
	'Menu:ARecord+' => 'Liste de tous les enregistrements A',
	'Menu:AAAARecord' => 'AAAA',
	'Menu:AAAARecord+' => 'Liste de tous les enregistrements AAAA',
	'Menu:CAARecord' => 'CAA',
	'Menu:CAARecord+' => 'Liste de tous les enregistrements CAA',
	'Menu:CNAMERecord' => 'CNAME',
	'Menu:CNAMERecord+' => 'Liste de tous les enregistrements CNAME',
	'Menu:DSRecord' => 'DS',
	'Menu:DSRecord+' => 'Liste de tous les enregistrements DS',
	'Menu:MXRecord' => 'MX',
	'Menu:MXRecord+' => 'Liste de tous les enregistrements MX',
	'Menu:NSRecord' => 'NS',
	'Menu:NSRecord+' => 'Liste de tous les enregistrements NS',
	'Menu:OPENPGPKEYRecord' => 'OPENPGPKEY',
	'Menu:OPENPGPKEYRecord+' => 'Liste de tous les enregistrements OPENPGPKEY',
	'Menu:PTRRecord' => 'PTR',
	'Menu:PTRRecord+' => 'Liste de tous les enregistrements PTR',
	'Menu:SOARecord' => 'SOA',
	'Menu:SOARecord+' => 'Liste de tous les enregistrements SOA',
	'Menu:SRVRecord' => 'SRV',
	'Menu:SRVRecord+' => 'Liste de tous les enregistrements SRV',
	'Menu:SSHFPRecord' => 'SSHFP',
	'Menu:SSHFPRecord+' => 'Liste de tous les enregistrements SSHFP',
	'Menu:TLSARecord' => 'TLSA',
	'Menu:TLSARecord+' => 'Liste de tous les enregistrements TLSA',
	'Menu:TXTRecord' => 'TXT',
	'Menu:TXTRecord+' => 'Liste de tous les enregistrements TXT',
	'Menu:GenericRecord' => 'GENERIC',
	'Menu:GenericRecord+' => 'Liste de tous les enregistrements génériques',
));
