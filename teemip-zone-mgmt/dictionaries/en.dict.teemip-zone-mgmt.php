<?php
/*
 * @copyright   Copyright (C) 2010-2024 TeemIp
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

//
// Class extensions for IPConfig
//

Dict::Add('EN US', 'English', 'English', array(
	'Class:IPConfig/Attribute:ip_update_dns_records' => 'Automatically update DNS records',
	'Class:IPConfig/Attribute:ip_update_dns_records+' => 'Automatically create, modify or delete Resource Records linked to an IP address',
	'Class:IPConfig/Attribute:ip_update_dns_records/Value:yes' => 'Yes',
	'Class:IPConfig/Attribute:ip_update_dns_records/Value:no' => 'No',
	'Class:IPConfig/Attribute:remove_rr_on_ip_obsolete' => 'Remove DNS records from obsolete IPs',
	'Class:IPConfig/Attribute:remove_rr_on_ip_obsolete+' => 'Remove Resource Records associated to IP addresses that become obsolete',
	'Class:IPConfig/Attribute:remove_rr_on_ip_obsolete/Value:yes' => 'Yes',
	'Class:IPConfig/Attribute:remove_rr_on_ip_obsolete/Value:no' => 'No',
    'Class:IPConfig/Attribute:serial_update_method' => 'Serial update method',
    'Class:IPConfig/Attribute:serial_update_method+' => 'Method used to update the serial number of a zone',
    'Class:IPConfig/Attribute:serial_update_method/Value:increment_by_one' => 'Increment by one',
    'Class:IPConfig/Attribute:serial_update_method/Value:set_date' => 'Date, in ISO 8601 basic format, followed by a two-digit counter',
    'Class:IPConfig/Attribute:serial_update_method/Value:set_ux_time' => 'Date expressed as the number of seconds since the UNIX epoch',
));

//
// Class extensions for IPAddress
//

Dict::Add('EN US', 'English', 'English', array(
	'Class:IPAddress/Attribute:view_id' => 'DNS View',
	'Class:IPAddress/Attribute:view_id+' => 'DNS view that the IP is resolved from',
	'Class:IPAddress/Attribute:view_name' => 'View name',
	'Class:IPAddress/Attribute:view_name+' => '',
	'Class:IPAddress/Tab:rrecords_list' => 'DNS Records',
	'Class:IPAddress/Tab:rrecords_list+' => 'List of all DNS Resource Records associated to the IP address.',
	'Class:IPAddress/Tab:ptrrecords_list' => 'PTR Records associated to the IP address',
	'Class:IPAddress/Tab:ptrrecords_list_empty' => 'There are no PTR records linked to this IP',
	'Class:IPAddress/Tab:arecords_list' => 'A Records associated to the IP address',
	'Class:IPAddress/Tab:arecords_list_empty' => 'There are no A records linked to this IP',
	'Class:IPAddress/Tab:aaaarecords_list' => 'AAAA Records associated to the IP address',
	'Class:IPAddress/Tab:aaaarecords_list_empty' => 'There are no AAAA records linked to this IP',
	'Class:IPAddress/Tab:cnamerecords_list' => 'CNAME Records associated to the IP address',
	'Class:IPAddress/Tab:cnamerecords_list_empty' => 'There are no CNAME records linked to this IP',
));

//
// Class extensions for IPSubnet
//

Dict::Add('EN US', 'English', 'English', array(
	'Class:IPSubnet/Tab:rrecords_list' => 'DNS Records',
	'Class:IPSubnet/Tab:rrecords_list+' => 'List of all DNS Resource Records associated to the subnet.',
	'Class:IPSubnet/Tab:ptrrecords_list' => 'PTR Records associated to the subnet',
	'Class:IPSubnet/Tab:ptrrecords_list_empty' => 'There are no PTR records linked to this subnet',
	'Class:IPSubnet/Tab:arecords_list' => 'A Records associated to the subnet',
	'Class:IPSubnet/Tab:arecords_list_empty' => 'There are no A records linked to this subnet',
	'Class:IPSubnet/Tab:aaaarecords_list' => 'AAAA Records associated to the subnet',
	'Class:IPSubnet/Tab:aaaarecords_list_empty' => 'There are no AAAA records linked to this subnet',
	'Class:IPSubnet/Tab:cnamerecords_list' => 'CNAME Records associated to the subnet',
	'Class:IPSubnet/Tab:cnamerecords_list_empty' => 'There are no CNAME records linked to this subnet',
));

//
// Class: View
//

Dict::Add('EN US', 'English', 'English', array(
	'Class:View' => 'View',
	'Class:View+' => 'DNS View',
	'Class:View/Attribute:org_id' => 'Organization',
	'Class:View/Attribute:org_id+' => 'Organization that the view belongs to',
	'Class:View/Attribute:org_name' => 'Organization name',
	'Class:View/Attribute:org_name+' => '',
	'Class:View/Attribute:name' => 'Name',
	'Class:View/Attribute:name+' => '',
	'Class:View/Attribute:description' => 'Description',
	'Class:View/Attribute:description+' => '',
	'Class:View/Attribute:zones_list' => 'Zones',
	'Class:View/Attribute:zones_list+' => 'All the zones in the view',
));

//
// Class: Zone
//

Dict::Add('EN US', 'English', 'English', array(
	'Class:Zone' => 'Zone',
	'Class:Zone+' => 'DNS Zone',
	'Class:Zone/Name' => '%1$s',
	'Class:Zone:baseinfo' => 'General Information',
	'Class:Zone:soainfo' => 'Start Of Authority',
	'Class:Zone/Attribute:view_id' => 'View',
	'Class:Zone/Attribute:view_id+' => 'View that the zone belongs to',
	'Class:Zone/Attribute:mapping' => 'Mapping type',
	'Class:Zone/Attribute:mapping+' => 'Type of resolution provided by the zone: forward, reverse for IPv4 addresses or reverse for IPv6 addresses',
	'Class:Zone/Attribute:mapping/Value:direct' => 'Forward',
	'Class:Zone/Attribute:mapping/Value:direct+' => 'Forward mapping',
	'Class:Zone/Attribute:mapping/Value:ipv4reverse' => 'IPv4 Reverse',
	'Class:Zone/Attribute:mapping/Value:ipv4reverse+' => 'Reverse mapping for IPv4 addresses: IPv4 to name',
	'Class:Zone/Attribute:mapping/Value:ipv6reverse' => 'IPv6 Reverse',
	'Class:Zone/Attribute:mapping/Value:ipv6reverse+' => 'Reverse mapping for IPv6 addresses: IPv6 to name',
	'Class:Zone/Attribute:name' => 'Zone Name',
	'Class:Zone/Attribute:name+' => '',
	'Class:Zone/Attribute:comment' => 'Comment',
	'Class:Zone/Attribute:comment+' => '',
	'Class:Zone/Attribute:requestor_id' => 'Requestor',
	'Class:Zone/Attribute:requestor_id+' => 'Person who requested the creation or the modification of the zone',
	'Class:Zone/Attribute:requestor_name' => 'Requestor name',
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
	'Class:Zone/Attribute:functionalcis_list' => 'Authoritative servers',
	'Class:Zone/Attribute:functionalcis_list+' => 'Authoritative servers looking after the zone',
	'Class:Zone/Tab:nsrecords_list' => 'NS records',
	'Class:Zone/Tab:nsrecords_list+' => 'List of all NS records of the zone',
	'Class:Zone/Tab:arecords_list' => 'A Records',
	'Class:Zone/Tab:arecords_list+' => 'List of all A Records of the zone',
	'Class:Zone/Tab:aaaarecords_list' => 'AAAA Records',
	'Class:Zone/Tab:aaaarecords_list+' => 'List of all AAAA Records of the zone',
	'Class:Zone/Tab:cnamerecords_list' => 'CNAME Records',
	'Class:Zone/Tab:cnamerecords_list+' => 'List of all CNAME Records of the zone',
	'Class:Zone/Tab:ptrrecords_list' => 'PTR records',
	'Class:Zone/Tab:ptrrecords_list+' => 'List of all PTR records of the zone',
	'Class:Zone/Tab:otherrecords_list' => 'Other Records',
	'Class:Zone/Tab:otherrecords_list+' => 'List of all other Records of the zone',
	'Class:Zone/Tab:records_list' => 'List of all %1$s records of the zone',
	'Class:Zone/Tab:records_list_empty' => 'There are no %1$s records in the zone',
	'Class:Zone/DataFile:NSRecord' => '
;
; Name servers
;',
	'Class:Zone/DataFile:ARecord' => '
;
; IPv4 addresses for the canonical names
;',
	'Class:Zone/DataFile:AAAARecord' => '
;
; IPv6 addresses for the canonical names
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
; Other records
;',
	'Class:Zone/DataFile:MXRecord' => '
;
; Mail exchangers
;',
	'Class:Zone/DataFile:OPENPGPKEYRecord' => '
;
; OpenPGP public keys
;',
	'Class:Zone/DataFile:PTRRecord' => '
;
; Addresses point to canonical names
;',
	'Class:Zone/DataFile:SRVRecord' => '
;
; Locate services
;',
	'Class:Zone/DataFile:SSHFPRecord' => '
;
; SSH Public Key Fingerprints
;',
	'Class:Zone/DataFile:TLSARecord' => '
;
; TLSA certificate associations
;',
	'Class:Zone/DataFile:TXTRecord' => '
;
; Text
;',
	'Class:Zone/DataFile:records_in_alphaorder' => '
;
; Other records in alphabetical order
;',
));

//
// Class: lnkFunctionalCIToZone
//

Dict::Add('EN US', 'English', 'English', array(
	'Class:lnkFunctionalCIToZone' => 'Link FunctionalCI / Zone',
	'Class:lnkFunctionalCIToZone+' => '',
	'Class:lnkFunctionalCIToZone/Name' => '%1$s / %2$s',
	'Class:lnkFunctionalCIToZone/Attribute:functionalci_id' => 'DNS Server',
	'Class:lnkFunctionalCIToZone/Attribute:functionalci_id+' => '',
	'Class:lnkFunctionalCIToZone/Attribute:functionalci_name' => 'DNS Server name',
	'Class:lnkFunctionalCIToZone/Attribute:functionalci_name+' => '',
	'Class:lnkFunctionalCIToZone/Attribute:zone_id' => 'Zone',
	'Class:lnkFunctionalCIToZone/Attribute:zone_id+' => '',
	'Class:lnkFunctionalCIToZone/Attribute:zone_name' => 'Zone name',
	'Class:lnkFunctionalCIToZone/Attribute:zone_name+' => '',
	'Class:lnkFunctionalCIToZone/Attribute:authority' => 'Authority',
	'Class:lnkFunctionalCIToZone/Attribute:authority+' => '',
	'Class:lnkFunctionalCIToZone/Attribute:authority/Value:master' => 'Master',
	'Class:lnkFunctionalCIToZone/Attribute:authority/Value:master+' => '',
	'Class:lnkFunctionalCIToZone/Attribute:authority/Value:slave' => 'Slave',
	'Class:lnkFunctionalCIToZone/Attribute:authority/Value:slave+' => '',
	'Class:lnkFunctionalCIToZone/Attribute:authority/Value:hidden_master' => 'Hidden master',
	'Class:lnkFunctionalCIToZone/Attribute:authority/Value:hidden_mastermaster+' => '',
	'Class:lnkFunctionalCIToZone/Attribute:authority/Value:hidden_slave' => 'Hidden slave',
	'Class:lnkFunctionalCIToZone/Attribute:authority/Value:hidden_slave+' => '',
));

//
// Class: ResourceRecord
//

Dict::Add('EN US', 'English', 'English', array(
	'Class:ResourceRecord' => 'Resource Record',
	'Class:ResourceRecord+' => 'DNS Resource Record',
	'Class:ResourceRecord/Attribute:finalclass' => 'Type',
	'Class:ResourceRecord/Attribute:finalclass+' => '',
	'Class:ResourceRecord/Attribute:org_id' => 'Organization',
	'Class:ResourceRecord/Attribute:org_id+' => 'Organization the the record belongs to',
	'Class:ResourceRecord/Attribute:org_name' => 'Organization name',
	'Class:ResourceRecord/Attribute:org_name+' => '',
	'Class:ResourceRecord/Attribute:name' => 'RR Name',
	'Class:ResourceRecord/Attribute:name+' => '',
	'Class:ResourceRecord/Attribute:comment' => 'Comment',
	'Class:ResourceRecord/Attribute:comment+' => '',
	'Class:ResourceRecord/Attribute:zone_id' => 'Zone',
	'Class:ResourceRecord/Attribute:zone_id+' => 'Zone that the record belongs to',
	'Class:ResourceRecord/Attribute:zone_name' => 'Zone name',
	'Class:ResourceRecord/Attribute:zone_name+' => '',
	'Class:ResourceRecord/Attribute:overwrite_zone_ttl' => 'Overwrite zone TTL',
	'Class:ResourceRecord/Attribute:overwrite_zone_ttl+' => 'Overwrite the TTL defined at the zone level or not',
	'Class:ResourceRecord/Attribute:overwrite_zone_ttl/Value:no' => 'No',
	'Class:ResourceRecord/Attribute:overwrite_zone_ttl/Value:no+' => '',
	'Class:ResourceRecord/Attribute:overwrite_zone_ttl/Value:yes' => 'Yes',
	'Class:ResourceRecord/Attribute:overwrite_zone_ttl/Value:yes+' => '',
	'Class:ResourceRecord/Attribute:ttl' => 'TTL',
	'Class:ResourceRecord/Attribute:ttl+' => 'Time To Live',
	'ResourceRecord:Zone' => 'Zone',
	'ResourceRecord:Record' => 'RRs attributes',
));

//
// Class: ResourceRecordType
//

Dict::Add('EN US', 'English', 'English', array(
	'Class:ResourceRecordType' => 'Resource Record Type',
	'Class:ResourceRecordType+' => 'Type of Resource Record that is not covered by a dedicated class',
	'Class:ResourceRecordType/Attribute:name' => 'Type',
	'Class:ResourceRecordType/Attribute:name+' => 'Type as it appears in a DB file',
	'Class:ResourceRecordType/Attribute:description' => 'Description',
	'Class:ResourceRecordType/Attribute:description+' => '',
));

//
// Class: ARecord
//

Dict::Add('EN US', 'English', 'English', array(
	'Class:ARecord' => 'A',
	'Class:ARecord+' => 'IPv4 Address Record',
	'Class:ARecord/Attribute:ip_id' => 'IPv4 Address',
	'Class:ARecord/Attribute:ip_id+' => '',
	'Class:ARecord/Attribute:ip_fqdn' => 'IPv4 Address FQDN',
	'Class:ARecord/Attribute:ip_fqdn+' => '',
));

//
// Class: AAAARecord
//

Dict::Add('EN US', 'English', 'English', array(
	'Class:AAAARecord' => 'AAAA',
	'Class:AAAARecord+' => 'IPv6 Address Record',
	'Class:AAAARecord/Attribute:ip_id' => 'IPv6 Address',
	'Class:AAAARecord/Attribute:ip_id+' => '',
	'Class:AAAARecord/Attribute:ip_fqdn' => 'IPv6 Address FQDN',
	'Class:AAAARecord/Attribute:ip_fqdn+' => '',
));

//
// Class: CAARecord
//

Dict::Add('EN US', 'English', 'English', array(
	'Class:CAARecord' => 'CAA',
	'Class:CAARecord+' => 'DNS Certification Authority Authorization Record',
	'Class:CAARecord/Attribute:flag' => 'Flag',
	'Class:CAARecord/Attribute:flag+' => 'Integer',
	'Class:CAARecord/Attribute:tag' => 'Tag',
	'Class:CAARecord/Attribute:tag+' => '',
	'Class:CAARecord/Attribute:tag/Value:issue' => 'Issue',
	'Class:CAARecord/Attribute:tag/Value:issue+' => '',
	'Class:CAARecord/Attribute:tag/Value:issuewild' => 'Issue Wild',
	'Class:CAARecord/Attribute:tag/Value:issuewild+' => '',
	'Class:CAARecord/Attribute:tag/Value:iodef' => 'Iodef',
	'Class:CAARecord/Attribute:tag/Value:iodef+' => '',
	'Class:CAARecord/Attribute:value' => 'Value',
	'Class:CAARecord/Attribute:value+' => 'Strings associated with tags.',
));

//
// Class: CNAMERecord
//

Dict::Add('EN US', 'English', 'English', array(
	'Class:CNAMERecord' => 'CNAME',
	'Class:CNAMERecord+' => 'Canonical Name Record',
	'Class:CNAMERecord/Attribute:cname' => 'Canonical Name',
	'Class:CNAMERecord/Attribute:cname+' => 'Canonical name or true name',
));

//
// Class: DSRecord
//

Dict::Add('EN US', 'English', 'English', array(
	'Class:DSRecord' => 'DS',
	'Class:DSRecord+' => 'Delegation Signer Record',
	'Class:DSRecord/Attribute:key_tag' => 'Key Tag',
	'Class:DSRecord/Attribute:key_tag+' => 'A short numeric value which can help quickly identify the referenced DNSKEY-record',
	'Class:DSRecord/Attribute:algorithm' => 'Algorithm',
	'Class:DSRecord/Attribute:algorithm+' => 'The algorithm of the referenced DNSKEY-record',
	'Class:DSRecord/Attribute:digest_type' => 'Digest Type',
	'Class:DSRecord/Attribute:digest_type+' => 'Cryptographic hash algorithm used to create the Digest value',
	'Class:DSRecord/Attribute:digest' => 'Digest',
	'Class:DSRecord/Attribute:digest+' => 'A cryptographic hash value of the referenced DNSKEY-record',
));

//
// Class: GenericRecord
//

Dict::Add('EN US', 'English', 'English', array(
	'Class:GenericRecord' => 'GENERIC',
	'Class:GenericRecord+' => 'Generic Record',
	'Class:GenericRecord/Attribute:payload' => 'Payload',
	'Class:GenericRecord/Attribute:payload+' => 'All what the db file should see behind Resource Record statement',
	'Class:GenericRecord/Attribute:rrtype_id' => 'Type',
	'Class:GenericRecord/Attribute:rrtype_id+' => 'Resource Record Type',
	'Class:GenericRecord/Attribute:rrtype_name' => 'Type name',
	'Class:GenericRecord/Attribute:rrtype_name+' => '',
));

//
// Class: MXRecord
//

Dict::Add('EN US', 'English', 'English', array(
	'Class:MXRecord' => 'MX',
	'Class:MXRecord+' => 'Mail Exchanger Record',
	'Class:MXRecord/Attribute:preference' => 'Preference',
	'Class:MXRecord/Attribute:preference+' => 'An integer that represents the preference for an email server',
	'Class:MXRecord/Attribute:exchange' => 'Mail exchange server',
	'Class:MXRecord/Attribute:exchange+' => 'The domain name of the email server',
));

//
// Class: NSRecord
//

Dict::Add('EN US', 'English', 'English', array(
	'Class:NSRecord' => 'NS',
	'Class:NSRecord+' => 'Name Server Record',
	'Class:NSRecord/Attribute:nsname' => 'Name server',
	'Class:NSRecord/Attribute:nsname+' => 'The hostname of the name server',
));

//
// Class: OPENPGPKEYRecord
//

Dict::Add('EN US', 'English', 'English', array(
	'Class:OPENPGPKEYRecord' => 'OPENPGPKEY',
	'Class:OPENPGPKEYRecord+' => 'OpenPGP Public Key Record',
	'Class:OPENPGPKEYRecord/Attribute:key' => 'OpenPGP Public Key',
	'Class:OPENPGPKEYRecord/Attribute:key+' => 'A OpenPGP Transferable Public Key',
));

//
// Class: PTRRecord
//

Dict::Add('EN US', 'English', 'English', array(
	'Class:PTRRecord' => 'PTR',
	'Class:PTRRecord+' => 'Pointer Record',
	'Class:PTRRecord/Attribute:hostname' => 'Hostname',
	'Class:PTRRecord/Attribute:hostname+' => 'The server name associated with the IP address',
));

//
// Class: SOARecord
//

Dict::Add('EN US', 'English', 'English', array(
	'Class:SOARecord' => 'SOA',
	'Class:SOARecord+' => 'Start of Authority Record',
	'Class:SOARecord/Attribute:sourcedname' => 'Master server',
	'Class:SOARecord/Attribute:sourcedname+' => '',
	'Class:SOARecord/Attribute:mbox' => 'Hostmaster mailbox',
	'Class:SOARecord/Attribute:mbox+' => '',
	'Class:SOARecord/Attribute:serial' => 'Serial',
	'Class:SOARecord/Attribute:serial+' => '',
	'Class:SOARecord/Attribute:refresh' => 'Refresh',
	'Class:SOARecord/Attribute:refresh+' => '',
	'Class:SOARecord/Attribute:retry' => 'Retry',
	'Class:SOARecord/Attribute:retry+' => '',
	'Class:SOARecord/Attribute:expire' => 'Expire',
	'Class:SOARecord/Attribute:expire+' => '',
	'Class:SOARecord/Attribute:minimum' => 'Minimum',
	'Class:SOARecord/Attribute:minimum+' => 'The negative result TTL',
));

//
// Class: SRVRecord
//

Dict::Add('EN US', 'English', 'English', array(
	'Class:SRVRecord' => 'SRV',
	'Class:SRVRecord+' => 'Service Record',
	'Class:SRVRecord/Attribute:priority' => 'Priority',
	'Class:SRVRecord/Attribute:priority+' => 'An integer that decides the priority of this target host',
	'Class:SRVRecord/Attribute:weight' => 'Weight',
	'Class:SRVRecord/Attribute:weight+' => 'Relative weight for entries with the same priority',
	'Class:SRVRecord/Attribute:port' => 'Port',
	'Class:SRVRecord/Attribute:port+' => 'TCP or UDP port where the specified service can be found',
	'Class:SRVRecord/Attribute:target' => 'Target',
	'Class:SRVRecord/Attribute:target+' => 'The domain name of the target host that will be providing this service',
));

//
// Class: SSHFPRecord
//

Dict::Add('EN US', 'English', 'English', array(
	'Class:SSHFPRecord' => 'SSHFP',
	'Class:SSHFPRecord+' => 'Secure SHell Fingerprint Record',
	'Class:SSHFPRecord/Attribute:algorithm' => 'Algorithm',
	'Class:SSHFPRecord/Attribute:algorithm+' => 'The algorithm of the referenced SSHFP-record',
	'Class:SSHFPRecord/Attribute:type' => 'Digest Type',
	'Class:SSHFPRecord/Attribute:type+' => 'Cryptographic hash algorithm used to create the Digest value',
	'Class:SSHFPRecord/Attribute:fingerprint' => 'Fingerprint',
	'Class:SSHFPRecord/Attribute:fingerprint+' => 'The hexadecimal representation of the hash value of the SSH key as text',
));

//
// Class: TLSARecord
//

Dict::Add('EN US', 'English', 'English', array(
	'Class:TLSARecord' => 'TLSA',
	'Class:TLSARecord+' => 'TLSA Certificate Association Record',
	'Class:TLSARecord/Attribute:certificate_usage' => 'Certificate Usage',
	'Class:TLSARecord/Attribute:certificate_usage+' => 'Integer',
	'Class:TLSARecord/Attribute:selector' => 'Selector',
	'Class:TLSARecord/Attribute:selector+' => 'Integer',
	'Class:TLSARecord/Attribute:matching_type' => 'Matching Type',
	'Class:TLSARecord/Attribute:matching_type+' => 'Integer',
	'Class:TLSARecord/Attribute:data' => 'Certificate Association Data',
	'Class:TLSARecord/Attribute:data+' => 'The actual data to be matched given the settings of the other fields',
));

//
// Class: TXTRecord
//

Dict::Add('EN US', 'English', 'English', array(
	'Class:TXTRecord' => 'TXT',
	'Class:TXTRecord+' => 'Text Record',
	'Class:TXTRecord/Attribute:txt' => 'Text',
	'Class:TXTRecord/Attribute:txt+' => 'Free form text of any type',
	'Class:TXTRecord/Attribute:previous_segment_id' => 'Previous segment',
	'Class:TXTRecord/Attribute:previous_segment_id+' => 'Text Record that contains the previous chunk of the long string (> 255 bytes) that is segmented between this text record and other ones.',
	'Class:TXTRecord/Attribute:next_segment_id' => 'Next segment',
	'Class:TXTRecord/Attribute:next_segment_id+' => 'Text Record that contains the next chunk of the long string (> 255 bytes) that is segmented between this text record and other ones.',
	'TXTRecord:Chaining' => 'Chaining',
));

//
// Management of zones
//
Dict::Add('EN US', 'English', 'English', array(
	'UI:ZoneManagement:Action:New:Zone:V4:WrongFormat' => 'Wrong format: IPv4 reverse zone format is x.[y.][z.]in-addr.arpa. or u-v.x.y.z.in-addr.arpa. !',
	'UI:ZoneManagement:Action:New:Zone:V6:WrongFormat' => 'Wrong format: IPv6 reverse zone format is x1.[x2.]...[xi.]ip6.arpa. !',
	'UI:ZoneManagement:Action:New:lnkFunctionalCIToZone:WrongCIClass' => 'An authoritative server can only be of Server, Virtual Machine, Network Device, Cluster Network or Application Solution class !',
));

//
// Management of data files
//
Dict::Add('EN US', 'English', 'English', array(
	'UI:ZoneManagement:Action:DataFileDisplay:Zone' => 'Data file',
	'UI:ZoneManagement:Action:DataFileDisplay:Zone:Menu' => 'Display data file',
	'UI:ZoneManagement:Action:DataFileDisplay:Zone:PageTitle_Object_Class' => '%1$s - %2$s data file',
	'UI:ZoneManagement:Action:DataFileDisplay:Zone:Title_Class_Object' => 'Data file of %1$s: %2$s',
	'UI:ZoneManagement:Action:DataFileDisplay:Zone:sort_by_record' => 'Display data file sorted by records',
	'UI:ZoneManagement:Action:DataFileDisplay:Zone:sort_by_char' => 'Display data file sorted by alphabetical order',
	'UI:ZoneManagement:Action:Details:Zone:Menu' => 'Details',
));

//
// Management of records
//
Dict::Add('EN US', 'English', 'English', array(
	'UI:ZoneManagement:Action:New:PTRRecord:V4:WrongNumberOfDigit' => 'Wrong format: IPv4 PTR records are made of 4 / 5 "numbers" - x.y.z.t.in-addr.arpa. / w.u-v.x.y.z.in-addr.arpa. !',
	'UI:ZoneManagement:Action:New:PTRRecord:V4:IPNotInZone' => 'Last digit of PTR in sub class C zone must belong to the range defined by the following digits (w in [u,v] for w.u-v.x.y.z.in-addr.arpa.) !',
	'UI:ZoneManagement:Action:New:PTRRecord:V4:IpNotInRange' => 'Wrong format: IPv4 numbers are contained within 0 - 255 range!',
	'UI:ZoneManagement:Action:New:PTRRecord:V4:WrongFormat' => 'Wrong format: IPv4 PTR records format is x.y.z.t.in-addr.arpa. or w.u-v.x.y.z.in-addr.arpa !',
	'UI:ZoneManagement:Action:New:PTRRecord:V6:WrongNumberOfDigit' => 'Wrong format: IPv6 PTR records are made of 32 numbers - x1.x2....x32.ip6.arpa. !',
	'UI:ZoneManagement:Action:New:PTRRecord:V6:IpNotInRange' => 'Wrong format: IPv6 numbers are contained within 0 - F range, in hexa!',
	'UI:ZoneManagement:Action:New:PTRRecord:V6:WrongFormat' => 'Wrong format: IPv6 PTR records format is x1.x2....x32.ip6.arpa. !',

	'UI:ZoneManagement:Action:IPObject:UpdateRR' => 'Create / Update DNS RRs',
	'UI:ZoneManagement:Action:IPObject:DeleteRR' => 'Delete DNS RRs',

	'UI:ZoneManagement:Action:IPAddress:UpdateRR' => 'Create / Update DNS RRs',
	'UI:ZoneManagement:Action:IPAddress:UpdateRRs:Error:NoShortName' => 'IP address has no short name!',
	'UI:ZoneManagement:Action:IPAddress:UpdateRRs:Error:NoDomainName' => 'IP address has no domain name!',
	'UI:ZoneManagement:Action:IPAddress:UpdateRRs:Error:CannotFindZone:direct' => 'Cannot find forward zone for given domain and view!',
	'UI:ZoneManagement:Action:IPAddress:UpdateRRs:Error:CannotFindZone:ipv4reverse' => 'Cannot find reverse zone!',
	'UI:ZoneManagement:Action:IPAddress:UpdateRRs:Error:CannotFindZone:ipv6reverse' => 'Cannot find reverse zone!',
	'UI:ZoneManagement:Action:IPAddress:UpdateRRs:HasNotRun' => 'No resource record has been created from address: %1$s',
	'UI:ZoneManagement:Action:IPAddress:UpdateRRs:HasErrors' => 'Some errors have been found: %1$s',
	'UI:ZoneManagement:Action:IPAddress:UpdateRRs:HasRun' => 'Resource records associated to IP address have been created or updated.',
	'UI:ZoneManagement:Action:IPAddress:CleanRRs:HasRun' => 'Resource records associated to IP address have been purged.',
	'UI:ZoneManagement:Action:IPAddress:DeleteRR' => 'Delete DNS RRs',

	'UI:ZoneManagement:Action:IPSubnet:UpdateRRs:HasNotRun' => 'No resource record has been created from subnet: %1$s',
	'UI:ZoneManagement:Action:IPSubnet:UpdateRRs:HasRun' => 'Resource records associated to subnet\'s IP addresses have been created or updated.',
	'UI:ZoneManagement:Action:IPSubnet:CleanRRs:HasRun' => 'Resource records associated to subnet\'s IP addresses have been purged.',
));

//
// Application Menu
//

Dict::Add('EN US', 'English', 'English', array(
	'Menu:DNSManagement' => 'DNS Management',
	'Menu:DNSManagement+' => '',
	'Menu:NameSpace' => 'Name Space',
	'Menu:NameSpace+' => 'Summary of all DNS objects',
	'Menu:DNSSpace:MainObjects' => 'Structural Objects',
	'Title:Zones:DirectMapping' => 'Forward Zones',
	'Title:Zones:V4ReverseMapping' => 'IPv4 reverse Zones',
	'Title:Zones:V6ReverseMapping' => 'IPv6 reverse Zones',
	'Menu:DNSSpace:ResourceRecords' => 'Common Resource Records',
	'Menu:DNSSpace:SecurityResourceRecords' => 'Security Resource Records',
	'Menu:DNSSpace:GenericResourceRecords' => 'Generic Resource Records',
	'Menu:View' => 'Views',
	'Menu:View+' => 'List of all DNS Views',
	'Menu:Domain' => 'Domains',
	'Menu:Domain+' => 'List of all DNS Domains',
	'Menu:Zone' => 'Zones',
	'Menu:Zone+' => 'List of all DNS Zones',
	'Menu:ZoneManagement:ResourceRecords' => 'Resource Records',
	'Menu:ZoneManagement:ResourceRecords+' => 'DNS Resource Records',
	'Menu:NewResourceRecord' => 'New RR',
	'Menu:NewResourceRecord+' => 'Create a new DNS Resource Record',
	'Menu:SearchResourceRecord' => 'Search for RRs',
	'Menu:SearchResourceRecord+' => 'Search for DNS Resource Records',
	'Menu:ARecord' => 'A',
	'Menu:ARecord+' => 'List of all A Records',
	'Menu:AAAARecord' => 'AAAA',
	'Menu:AAAARecord+' => 'List of all AAAA Records',
	'Menu:CAARecord' => 'CAA',
	'Menu:CAARecord+' => 'List of all CAA Records',
	'Menu:CNAMERecord' => 'CNAME',
	'Menu:CNAMERecord+' => 'List of all CNAME Records',
	'Menu:DSRecord' => 'DS',
	'Menu:DSRecord+' => 'List of all DS Records',
	'Menu:MXRecord' => 'MX',
	'Menu:MXRecord+' => 'List of all MX Records',
	'Menu:NSRecord' => 'NS',
	'Menu:NSRecord+' => 'List of all NS Records',
	'Menu:OPENPGPKEYRecord' => 'OPENPGPKEY',
	'Menu:OPENPGPKEYRecord+' => 'List of all OPENPGPKEY Records',
	'Menu:PTRRecord' => 'PTR',
	'Menu:PTRRecord+' => 'List of all PTR Records',
	'Menu:SOARecord' => 'SOA',
	'Menu:SOARecord+' => 'List of all SOA Records',
	'Menu:SRVRecord' => 'SRV',
	'Menu:SRVRecord+' => 'List of all SRV Records',
	'Menu:SSHFPRecord' => 'SSHFP',
	'Menu:SSHFPRecord+' => 'List of all SSHFP Records',
	'Menu:TLSARecord' => 'TLSA',
	'Menu:TLSARecord+' => 'List of all TLSA Records',
	'Menu:TXTRecord' => 'TXT',
	'Menu:TXTRecord+' => 'List of all TXT Records',
	'Menu:GenericRecord' => 'GENERIC',
	'Menu:GenericRecord+' => 'List of all generic or custom Records',
));
