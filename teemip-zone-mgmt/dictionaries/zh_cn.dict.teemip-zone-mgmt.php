<?php
/*
 * @copyright   Copyright (C) 2010-2024 TeemIp
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

//
// Class extensions for IPConfig
//

Dict::Add('ZH CN', 'Chinese', '简体中文', array(
    'Class:IPConfig/Attribute:ip_update_dns_records' => '自动更新DNS记录',
    'Class:IPConfig/Attribute:ip_update_dns_records+' => '自动创建、修改或删除与IP地址关联的资源记录',
    'Class:IPConfig/Attribute:ip_update_dns_records/Value:yes' => '是',
    'Class:IPConfig/Attribute:ip_update_dns_records/Value:no' => '否',
    'Class:IPConfig/Attribute:remove_rr_on_ip_obsolete' => '从废弃的IP中删除DNS记录',
    'Class:IPConfig/Attribute:remove_rr_on_ip_obsolete+' => '删除与变为废弃状态的IP地址相关联的资源记录',
    'Class:IPConfig/Attribute:remove_rr_on_ip_obsolete/Value:yes' => '是',
    'Class:IPConfig/Attribute:remove_rr_on_ip_obsolete/Value:no' => '否',
));

//
// Class extensions for IPAddress
//

Dict::Add('ZH CN', 'Chinese', '简体中文', array(
    'Class:IPAddress/Attribute:view_id' => 'DNS视图',
    'Class:IPAddress/Attribute:view_id+' => 'IP解析出的DNS视图',
    'Class:IPAddress/Attribute:view_name' => '视图名称',
    'Class:IPAddress/Attribute:view_name+' => '',
    'Class:IPAddress/Tab:rrecords_list' => 'DNS记录',
    'Class:IPAddress/Tab:rrecords_list+' => '与IP地址关联的所有DNS资源记录列表。',
    'Class:IPAddress/Tab:ptrrecords_list' => '与IP地址关联的PTR记录',
    'Class:IPAddress/Tab:ptrrecords_list_empty' => '此IP没有关联的PTR记录',
    'Class:IPAddress/Tab:arecords_list' => '与IP地址关联的A记录',
    'Class:IPAddress/Tab:arecords_list_empty' => '此IP没有关联的A记录',
    'Class:IPAddress/Tab:aaaarecords_list' => '与IP地址关联的AAAA记录',
    'Class:IPAddress/Tab:aaaarecords_list_empty' => '此IP没有关联的AAAA记录',
    'Class:IPAddress/Tab:cnamerecords_list' => '与IP地址关联的CNAME记录',
    'Class:IPAddress/Tab:cnamerecords_list_empty' => '此IP没有关联的CNAME记录',
));

//
// Class extensions for IPSubnet
//

Dict::Add('ZH CN', 'Chinese', '简体中文', array(
    'Class:IPSubnet/Tab:rrecords_list' => 'DNS记录',
    'Class:IPSubnet/Tab:rrecords_list+' => '与子网关联的所有DNS资源记录列表。',
    'Class:IPSubnet/Tab:ptrrecords_list' => '与子网关联的PTR记录',
    'Class:IPSubnet/Tab:ptrrecords_list_empty' => '此子网没有关联的PTR记录',
    'Class:IPSubnet/Tab:arecords_list' => '与子网关联的A记录',
    'Class:IPSubnet/Tab:arecords_list_empty' => '此子网没有关联的A记录',
    'Class:IPSubnet/Tab:aaaarecords_list' => '与子网关联的AAAA记录',
    'Class:IPSubnet/Tab:aaaarecords_list_empty' => '此子网没有关联的AAAA记录',
    'Class:IPSubnet/Tab:cnamerecords_list' => '与子网关联的CNAME记录',
    'Class:IPSubnet/Tab:cnamerecords_list_empty' => '此子网没有关联的CNAME记录',
));


//
// Class: View
//

Dict::Add('ZH CN', 'Chinese', '简体中文', array(
    'Class:View' => '视图',
    'Class:View+' => 'DNS视图',
    'Class:View/Attribute:org_id' => '组织',
    'Class:View/Attribute:org_id+' => '视图所属的组织',
    'Class:View/Attribute:org_name' => '组织名称',
    'Class:View/Attribute:org_name+' => '',
    'Class:View/Attribute:name' => '名称',
    'Class:View/Attribute:name+' => '',
    'Class:View/Attribute:description' => '描述',
    'Class:View/Attribute:description+' => '',
    'Class:View/Attribute:zones_list' => '区域',
    'Class:View/Attribute:zones_list+' => '视图中的所有区域',
));

//
// Class: Zone
//

Dict::Add('ZH CN', 'Chinese', '简体中文', array(
    'Class:Zone' => '区域',
    'Class:Zone+' => 'DNS区域',
    'Class:Zone/Name' => '%1$s',
    'Class:Zone:baseinfo' => '常规信息',
    'Class:Zone:soainfo' => '授权起始点',
    'Class:Zone/Attribute:view_id' => '视图',
    'Class:Zone/Attribute:view_id+' => '区域所属的视图',
    'Class:Zone/Attribute:mapping' => '映射类型',
    'Class:Zone/Attribute:mapping+' => '区域提供的解析类型: 正向，IPv4地址的反向或IPv6地址的反向',
    'Class:Zone/Attribute:mapping/Value:direct' => '正向',
    'Class:Zone/Attribute:mapping/Value:direct+' => '正向映射',
    'Class:Zone/Attribute:mapping/Value:ipv4reverse' => 'IPv4反向',
    'Class:Zone/Attribute:mapping/Value:ipv4reverse+' => 'IPv4地址的反向映射: IPv4到名称',
    'Class:Zone/Attribute:mapping/Value:ipv6reverse' => 'IPv6反向',
    'Class:Zone/Attribute:mapping/Value:ipv6reverse+' => 'IPv6地址的反向映射: IPv6到名称',
    'Class:Zone/Attribute:name' => '区域名称',
    'Class:Zone/Attribute:name+' => '',
    'Class:Zone/Attribute:comment' => '评论',
    'Class:Zone/Attribute:comment+' => '',
    'Class:Zone/Attribute:requestor_id' => '请求者',
    'Class:Zone/Attribute:requestor_id+' => '请求创建或修改区域的人',
    'Class:Zone/Attribute:requestor_name' => '请求者名称',
    'Class:Zone/Attribute:requestor_name+' => '',
    'Class:Zone/Attribute:ttl' => 'TTL',
    'Class:Zone/Attribute:ttl+' => '生存时间',
    'Class:Zone/Attribute:sourcedname' => '主服务器',
    'Class:Zone/Attribute:sourcedname+' => '',
    'Class:Zone/Attribute:mbox' => '主控邮箱',
    'Class:Zone/Attribute:mbox+' => '',
    'Class:Zone/Attribute:serial' => '序列号',
    'Class:Zone/Attribute:serial+' => '',
    'Class:Zone/Attribute:refresh' => '刷新',
    'Class:Zone/Attribute:refresh+' => '',
    'Class:Zone/Attribute:retry' => '重试',
    'Class:Zone/Attribute:retry+' => '',
    'Class:Zone/Attribute:expire' => '过期',
    'Class:Zone/Attribute:expire+' => '',
    'Class:Zone/Attribute:minimum' => '最小',
    'Class:Zone/Attribute:minimum+' => '',
    'Class:Zone/Attribute:functionalcis_list' => '授权服务器',
    'Class:Zone/Attribute:functionalcis_list+' => '管理该区域的授权服务器',
    'Class:Zone/Tab:nsrecords_list' => 'NS记录',
    'Class:Zone/Tab:nsrecords_list+' => '区域的所有NS记录列表',
    'Class:Zone/Tab:arecords_list' => 'A记录',
    'Class:Zone/Tab:arecords_list+' => '区域的所有A记录列表',
    'Class:Zone/Tab:aaaarecords_list' => 'AAAA记录',
    'Class:Zone/Tab:aaaarecords_list+' => '区域的所有AAAA记录列表',
    'Class:Zone/Tab:cnamerecords_list' => 'CNAME记录',
    'Class:Zone/Tab:cnamerecords_list+' => '区域的所有CNAME记录列表',
    'Class:Zone/Tab:ptrrecords_list' => 'PTR记录',
    'Class:Zone/Tab:ptrrecords_list+' => '区域的所有PTR记录列表',
    'Class:Zone/Tab:otherrecords_list' => '其他记录',
    'Class:Zone/Tab:otherrecords_list+' => '区域的所有其他记录列表',
    'Class:Zone/Tab:records_list' => '区域的所有%1$s记录列表',
    'Class:Zone/Tab:records_list_empty' => '该区域中没有%1$s记录',
    'Class:Zone/DataFile:NSRecord' => '
;
; 域名服务器
;',
    'Class:Zone/DataFile:ARecord' => '
;
; 规范名称的IPv4地址
;',
    'Class:Zone/DataFile:AAAARecord' => '
;
; 规范名称的IPv6地址
;',
    'Class:Zone/DataFile:CAARecord' => '
;
; 认证机构授权
;',
    'Class:Zone/DataFile:CNAMERecord' => '
;
; 别名
;',
    'Class:Zone/DataFile:DSRecord' => '
;
; 委托签署者
;',
    'Class:Zone/DataFile:GenericRecord' => '
;
; 其他记录
;',
    'Class:Zone/DataFile:MXRecord' => '
;
; 邮件交换器
;',
    'Class:Zone/DataFile:OPENPGPKEYRecord' => '
;
; OpenPGP公钥
;',
    'Class:Zone/DataFile:PTRRecord' => '
;
; 地址指向规范名称
;',
    'Class:Zone/DataFile:SRVRecord' => '
;
; 定位服务
;',
    'Class:Zone/DataFile:SSHFPRecord' => '
;
; SSH公钥指纹
;',
    'Class:Zone/DataFile:TLSARecord' => '
;
; TLSA证书关联
;',
    'Class:Zone/DataFile:TXTRecord' => '
;
; 文本
;',
    'Class:Zone/DataFile:records_in_alphaorder' => '
;
; 按字母顺序排列的其他记录
;',
));

//
// Class: lnkFunctionalCIToZone
//


Dict::Add('ZH CN', 'Chinese', '简体中文', array(
    'Class:lnkFunctionalCIToZone' => '关联功能CI / 区域',
    'Class:lnkFunctionalCIToZone+' => '',
    'Class:lnkFunctionalCIToZone/Name' => '%1$s / %2$s',
    'Class:lnkFunctionalCIToZone/Attribute:functionalci_id' => 'DNS服务器',
    'Class:lnkFunctionalCIToZone/Attribute:functionalci_id+' => '',
    'Class:lnkFunctionalCIToZone/Attribute:functionalci_name' => 'DNS服务器名称',
    'Class:lnkFunctionalCIToZone/Attribute:functionalci_name+' => '',
    'Class:lnkFunctionalCIToZone/Attribute:zone_id' => '区域',
    'Class:lnkFunctionalCIToZone/Attribute:zone_id+' => '',
    'Class:lnkFunctionalCIToZone/Attribute:zone_name' => '区域名称',
    'Class:lnkFunctionalCIToZone/Attribute:zone_name+' => '',
    'Class:lnkFunctionalCIToZone/Attribute:authority' => '授权',
    'Class:lnkFunctionalCIToZone/Attribute:authority+' => '',
    'Class:lnkFunctionalCIToZone/Attribute:authority/Value:master' => '主服务器',
    'Class:lnkFunctionalCIToZone/Attribute:authority/Value:master+' => '',
    'Class:lnkFunctionalCIToZone/Attribute:authority/Value:slave' => '从服务器',
    'Class:lnkFunctionalCIToZone/Attribute:authority/Value:slave+' => '',
    'Class:lnkFunctionalCIToZone/Attribute:authority/Value:hidden_master' => '隐藏主服务器',
    'Class:lnkFunctionalCIToZone/Attribute:authority/Value:hidden_mastermaster+' => '',
    'Class:lnkFunctionalCIToZone/Attribute:authority/Value:hidden_slave' => '隐藏从服务器',
    'Class:lnkFunctionalCIToZone/Attribute:authority/Value:hidden_slave+' => '',
));

//
// Class: ResourceRecord
//

Dict::Add('ZH CN', 'Chinese', '简体中文', array(
    'Class:ResourceRecord' => '资源记录',
    'Class:ResourceRecord+' => 'DNS资源记录',
    'Class:ResourceRecord/Attribute:finalclass' => '类型',
    'Class:ResourceRecord/Attribute:finalclass+' => '',
    'Class:ResourceRecord/Attribute:org_id' => '组织',
    'Class:ResourceRecord/Attribute:org_id+' => '记录所属的组织',
    'Class:ResourceRecord/Attribute:org_name' => '组织名称',
    'Class:ResourceRecord/Attribute:org_name+' => '',
    'Class:ResourceRecord/Attribute:name' => 'RR名称',
    'Class:ResourceRecord/Attribute:name+' => '',
    'Class:ResourceRecord/Attribute:comment' => '评论',
    'Class:ResourceRecord/Attribute:comment+' => '',
    'Class:ResourceRecord/Attribute:zone_id' => '区域',
    'Class:ResourceRecord/Attribute:zone_id+' => '记录所属的区域',
    'Class:ResourceRecord/Attribute:zone_name' => '区域名称',
    'Class:ResourceRecord/Attribute:zone_name+' => '',
    'Class:ResourceRecord/Attribute:overwrite_zone_ttl' => '覆盖区域TTL',
    'Class:ResourceRecord/Attribute:overwrite_zone_ttl+' => '是否覆盖区域级别定义的TTL',
    'Class:ResourceRecord/Attribute:overwrite_zone_ttl/Value:no' => '否',
    'Class:ResourceRecord/Attribute:overwrite_zone_ttl/Value:no+' => '',
    'Class:ResourceRecord/Attribute:overwrite_zone_ttl/Value:yes' => '是',
    'Class:ResourceRecord/Attribute:overwrite_zone_ttl/Value:yes+' => '',
    'Class:ResourceRecord/Attribute:ttl' => 'TTL',
    'Class:ResourceRecord/Attribute:ttl+' => '生存时间',
    'ResourceRecord:Zone' => '区域',
    'ResourceRecord:Record' => 'RR属性',
));

//
// Class: ResourceRecordType
//

Dict::Add('ZH CN', 'Chinese', '简体中文', array(
    'Class:ResourceRecordType' => '资源记录类型',
    'Class:ResourceRecordType+' => '没有专用类别的资源记录类型',
    'Class:ResourceRecordType/Attribute:name' => '类型',
    'Class:ResourceRecordType/Attribute:name+' => '在DB文件中出现的类型',
    'Class:ResourceRecordType/Attribute:description' => '描述',
    'Class:ResourceRecordType/Attribute:description+' => '',
));

//
// Class: ARecord
//

Dict::Add('ZH CN', 'Chinese', '简体中文', array(
    'Class:ARecord' => 'A',
    'Class:ARecord+' => 'IPv4地址记录',
    'Class:ARecord/Attribute:ip_id' => 'IPv4地址',
    'Class:ARecord/Attribute:ip_id+' => '',
    'Class:ARecord/Attribute:ip_fqdn' => 'IPv4地址FQDN',
    'Class:ARecord/Attribute:ip_fqdn+' => '',
));

//
// Class: AAAARecord
//

Dict::Add('ZH CN', 'Chinese', '简体中文', array(
    'Class:AAAARecord' => 'AAAA',
    'Class:AAAARecord+' => 'IPv6地址记录',
    'Class:AAAARecord/Attribute:ip_id' => 'IPv6地址',
    'Class:AAAARecord/Attribute:ip_id+' => '',
    'Class:AAAARecord/Attribute:ip_fqdn' => 'IPv6地址FQDN',
    'Class:AAAARecord/Attribute:ip_fqdn+' => '',
));

//
// Class: CAARecord
//

Dict::Add('ZH CN', 'Chinese', '简体中文', array(
    'Class:CAARecord' => 'CAA',
    'Class:CAARecord+' => 'DNS认证机构授权记录',
    'Class:CAARecord/Attribute:flag' => '标志',
    'Class:CAARecord/Attribute:flag+' => '整数',
    'Class:CAARecord/Attribute:tag' => '标签',
    'Class:CAARecord/Attribute:tag+' => '',
    'Class:CAARecord/Attribute:tag/Value:issue' => '签发',
    'Class:CAARecord/Attribute:tag/Value:issue+' => '',
    'Class:CAARecord/Attribute:tag/Value:issuewild' => '签发通配符',
    'Class:CAARecord/Attribute:tag/Value:issuewild+' => '',
    'Class:CAARecord/Attribute:tag/Value:iodef' => 'Iodef',
    'Class:CAARecord/Attribute:tag/Value:iodef+' => '',
    'Class:CAARecord/Attribute:value' => '值',
    'Class:CAARecord/Attribute:value+' => '与标签相关的字符串。',
));

//
// Class: CNAMERecord
//

Dict::Add('ZH CN', 'Chinese', '简体中文', array(
    'Class:CNAMERecord' => 'CNAME',
    'Class:CNAMERecord+' => '规范名称记录',
    'Class:CNAMERecord/Attribute:cname' => '规范名称',
    'Class:CNAMERecord/Attribute:cname+' => '规范名称或真实名称',
));

//
// Class: DSRecord
//

Dict::Add('ZH CN', 'Chinese', '简体中文', array(
    'Class:DSRecord' => 'DS',
    'Class:DSRecord+' => '委托签名记录',
    'Class:DSRecord/Attribute:key_tag' => '键标签',
    'Class:DSRecord/Attribute:key_tag+' => '可帮助快速识别引用的DNSKEY记录的短数字值',
    'Class:DSRecord/Attribute:algorithm' => '算法',
    'Class:DSRecord/Attribute:algorithm+' => '引用的DNSKEY记录的算法',
    'Class:DSRecord/Attribute:digest_type' => '摘要类型',
    'Class:DSRecord/Attribute:digest_type+' => '用于创建摘要值的密码哈希算法',
    'Class:DSRecord/Attribute:digest' => '摘要',
    'Class:DSRecord/Attribute:digest+' => '引用的DNSKEY记录的密码哈希值',
));

//
// Class: GenericRecord
//

Dict::Add('ZH CN', 'Chinese', '简体中文', array(
    'Class:GenericRecord' => '通用',
    'Class:GenericRecord+' => '通用记录',
    'Class:GenericRecord/Attribute:payload' => '有效载荷',
    'Class:GenericRecord/Attribute:payload+' => 'DB文件在Resource Record语句后应该看到的所有内容',
    'Class:GenericRecord/Attribute:rrtype_id' => '类型',
    'Class:GenericRecord/Attribute:rrtype_id+' => '资源记录类型',
    'Class:GenericRecord/Attribute:rrtype_name' => '类型名称',
    'Class:GenericRecord/Attribute:rrtype_name+' => '',
));

//
// Class: MXRecord
//

Dict::Add('ZH CN', 'Chinese', '简体中文', array(
    'Class:MXRecord' => 'MX',
    'Class:MXRecord+' => '邮件交换记录',
    'Class:MXRecord/Attribute:preference' => '优先级',
    'Class:MXRecord/Attribute:preference+' => '表示电子邮件服务器的优先级的整数',
    'Class:MXRecord/Attribute:exchange' => '邮件交换服务器',
    'Class:MXRecord/Attribute:exchange+' => '电子邮件服务器的域名',
));

//
// Class: NSRecord
//

Dict::Add('ZH CN', 'Chinese', '简体中文', array(
    'Class:NSRecord' => 'NS',
    'Class:NSRecord+' => '名称服务器记录',
    'Class:NSRecord/Attribute:nsname' => '名称服务器',
    'Class:NSRecord/Attribute:nsname+' => '名称服务器的主机名',
));

//
// Class: OPENPGPKEYRecord
//

Dict::Add('ZH CN', 'Chinese', '简体中文', array(
    'Class:OPENPGPKEYRecord' => 'OPENPGPKEY',
    'Class:OPENPGPKEYRecord+' => 'OpenPGP公钥记录',
    'Class:OPENPGPKEYRecord/Attribute:key' => 'OpenPGP公钥',
    'Class:OPENPGPKEYRecord/Attribute:key+' => 'OpenPGP可传输的公钥',
));

//
// Class: PTRRecord
//

Dict::Add('ZH CN', 'Chinese', '简体中文', array(
    'Class:PTRRecord' => 'PTR',
    'Class:PTRRecord+' => '指针记录',
    'Class:PTRRecord/Attribute:hostname' => '主机名',
    'Class:PTRRecord/Attribute:hostname+' => '与IP地址关联的服务器名称',
));

//
// Class: SOARecord
//


Dict::Add('ZH CN', 'Chinese', '简体中文', array(
    'Class:SOARecord' => 'SOA',
    'Class:SOARecord+' => '授权起始记录',
    'Class:SOARecord/Attribute:sourcedname' => '主服务器',
    'Class:SOARecord/Attribute:sourcedname+' => '',
    'Class:SOARecord/Attribute:mbox' => 'Hostmaster邮箱',
    'Class:SOARecord/Attribute:mbox+' => '',
    'Class:SOARecord/Attribute:serial' => '序列号',
    'Class:SOARecord/Attribute:serial+' => '',
    'Class:SOARecord/Attribute:refresh' => '刷新',
    'Class:SOARecord/Attribute:refresh+' => '',
    'Class:SOARecord/Attribute:retry' => '重试',
    'Class:SOARecord/Attribute:retry+' => '',
    'Class:SOARecord/Attribute:expire' => '过期',
    'Class:SOARecord/Attribute:expire+' => '',
    'Class:SOARecord/Attribute:minimum' => '最小值',
    'Class:SOARecord/Attribute:minimum+' => '负结果的TTL',
));

// Class: SRVRecord

Dict::Add('ZH CN', 'Chinese', '简体中文', array(
    'Class:SRVRecord' => 'SRV',
    'Class:SRVRecord+' => '服务记录',
    'Class:SRVRecord/Attribute:priority' => '优先级',
    'Class:SRVRecord/Attribute:priority+' => '决定目标主机的优先级的整数',
    'Class:SRVRecord/Attribute:weight' => '权重',
    'Class:SRVRecord/Attribute:weight+' => '相同优先级的条目的相对权重',
    'Class:SRVRecord/Attribute:port' => '端口',
    'Class:SRVRecord/Attribute:port+' => '指定服务的TCP或UDP端口',
    'Class:SRVRecord/Attribute:target' => '目标',
    'Class:SRVRecord/Attribute:target+' => '提供此服务的目标主机的域名',
));

// Class: SSHFPRecord

Dict::Add('ZH CN', 'Chinese', '简体中文', array(
    'Class:SSHFPRecord' => 'SSHFP',
    'Class:SSHFPRecord+' => '安全外壳指纹记录',
    'Class:SSHFPRecord/Attribute:algorithm' => '算法',
    'Class:SSHFPRecord/Attribute:algorithm+' => '引用的SSHFP记录的算法',
    'Class:SSHFPRecord/Attribute:type' => '摘要类型',
    'Class:SSHFPRecord/Attribute:type+' => '用于创建摘要值的加密哈希算法',
    'Class:SSHFPRecord/Attribute:fingerprint' => '指纹',
    'Class:SSHFPRecord/Attribute:fingerprint+' => 'SSH密钥的哈希值的十六进制表示',
));

// Class: TLSARecord

Dict::Add('ZH CN', 'Chinese', '简体中文', array(
    'Class:TLSARecord' => 'TLSA',
    'Class:TLSARecord+' => 'TLSA证书关联记录',
    'Class:TLSARecord/Attribute:certificate_usage' => '证书用途',
    'Class:TLSARecord/Attribute:certificate_usage+' => '整数',
    'Class:TLSARecord/Attribute:selector' => '选择器',
    'Class:TLSARecord/Attribute:selector+' => '整数',
    'Class:TLSARecord/Attribute:matching_type' => '匹配类型',
    'Class:TLSARecord/Attribute:matching_type+' => '整数',
    'Class:TLSARecord/Attribute:data' => '证书关联数据',
    'Class:TLSARecord/Attribute:data+' => '根据其他字段的设置匹配的实际数据',
));

// Class: TXTRecord

Dict::Add('ZH CN', 'Chinese', '简体中文', array(
    'Class:TXTRecord' => 'TXT',
    'Class:TXTRecord+' => '文本记录',
    'Class:TXTRecord/Attribute:txt' => '文本',
    'Class:TXTRecord/Attribute:txt+' => '任意类型的自由文本',
));

// 管理区域

Dict::Add('ZH CN', 'Chinese', '简体中文', array(
    'UI:ZoneManagement:Action:New:Zone:V4:WrongFormat' => '格式错误：IPv4反向区域格式为x.[y.][z.]in-addr.arpa.或u-v.x.y.z.in-addr.arpa.！',
    'UI:ZoneManagement:Action:New:Zone:V6:WrongFormat' => '格式错误：IPv6反向区域格式为x1.[x2.]...[xi.]ip6.arpa.！',
    'UI:ZoneManagement:Action:New:lnkFunctionalCIToZone:WrongCIClass' => '授权服务器只能是服务器、虚拟机、网络设备、集群网络或应用解决方案类别！',
));

// 管理数据文件

Dict::Add('ZH CN', 'Chinese', '简体中文', array(
    'UI:ZoneManagement:Action:DataFileDisplay:Zone' => '数据文件',
    'UI:ZoneManagement:Action:DataFileDisplay:Zone:Menu' => '显示数据文件',
    'UI:ZoneManagement:Action:DataFileDisplay:Zone:PageTitle_Object_Class' => '%1$s - %2$s数据文件',
    'UI:ZoneManagement:Action:DataFileDisplay:Zone:Title_Class_Object' => '%1$s的数据文件：%2$s',
    'UI:ZoneManagement:Action:DataFileDisplay:Zone:sort_by_record' => '按记录排序显示数据文件',
    'UI:ZoneManagement:Action:DataFileDisplay:Zone:sort_by_char' => '按字母顺序排序显示数据文件',
    'UI:ZoneManagement:Action:Details:Zone:Menu' => '详细信息',
));

// 记录管理

Dict::Add('ZH CN', 'Chinese', '简体中文', array(
    'UI:ZoneManagement:Action:New:PTRRecord:V4:WrongNumberOfDigit' => '格式错误：IPv4 PTR记录由4/5个“数字”组成 - x.y.z.t.in-addr.arpa. / w.u-v.x.y.z.in-addr.arpa.！',
    'UI:ZoneManagement:Action:New:PTRRecord:V4:IPNotInZone' => 'PTR的最后一位在子类C区域必须属于由以下数字定义的范围（w在[u,v]中为w.u-v.x.y.z.in-addr.arpa.）！',
    'UI:ZoneManagement:Action:New:PTRRecord:V4:IpNotInRange' => '格式错误：IPv4数字在0-255范围内！',
    'UI:ZoneManagement:Action:New:PTRRecord:V4:WrongFormat' => '格式错误：IPv4 PTR记录格式为x.y.z.t.in-addr.arpa.或w.u-v.x.y.z.in-addr.arpa！',
    'UI:ZoneManagement:Action:New:PTRRecord:V6:WrongNumberOfDigit' => '格式错误：IPv6 PTR记录由32个数字组成 - x1.x2....x32.ip6.arpa.！',
    'UI:ZoneManagement:Action:New:PTRRecord:V6:IpNotInRange' => '格式错误：IPv6数字以16进制形式在0-F范围内！',
    'UI:ZoneManagement:Action:New:PTRRecord:V6:WrongFormat' => '格式错误：IPv6 PTR记录格式为x1.x2....x32.ip6.arpa.！',

    'UI:ZoneManagement:Action:IPObject:UpdateRR' => '创建/更新DNS资源记录',
    'UI:ZoneManagement:Action:IPObject:DeleteRR' => '删除DNS资源记录',

    'UI:ZoneManagement:Action:IPAddress:UpdateRR' => '创建/更新DNS资源记录',
    'UI:ZoneManagement:Action:IPAddress:UpdateRRs:Error:NoShortName' => 'IP地址没有简称！',
    'UI:ZoneManagement:Action:IPAddress:UpdateRRs:Error:NoDomainName' => 'IP地址没有域名！',
    'UI:ZoneManagement:Action:IPAddress:UpdateRRs:Error:CannotFindZone:direct' => '找不到给定域和视图的正向区域！',
    'UI:ZoneManagement:Action:IPAddress:UpdateRRs:Error:CannotFindZone:ipv4reverse' => '找不到反向区域！',
    'UI:ZoneManagement:Action:IPAddress:UpdateRRs:Error:CannotFindZone:ipv6reverse' => '找不到反向区域！',
    'UI:ZoneManagement:Action:IPAddress:UpdateRRs:HasNotRun' => '从地址创建的资源记录不存在：%1$s',
    'UI:ZoneManagement:Action:IPAddress:UpdateRRs:HasErrors' => '发现一些错误：%1$s',
    'UI:ZoneManagement:Action:IPAddress:UpdateRRs:HasRun' => '与IP地址关联的资源记录已创建或更新。',
    'UI:ZoneManagement:Action:IPAddress:CleanRRs:HasRun' => '与IP地址关联的资源记录已清除。',
    'UI:ZoneManagement:Action:IPAddress:DeleteRR' => '删除DNS资源记录',

    'UI:ZoneManagement:Action:IPSubnet:UpdateRRs:HasNotRun' => '从子网创建的资源记录不存在：%1$s',
    'UI:ZoneManagement:Action:IPSubnet:UpdateRRs:HasRun' => '与子网IP地址关联的资源记录已创建或更新。',
    'UI:ZoneManagement:Action:IPSubnet:CleanRRs:HasRun' => '与子网IP地址关联的资源记录已清除。',
));

// 应用程序菜单

Dict::Add('ZH CN', 'Chinese', '简体中文', array(
    'Menu:DNSManagement' => 'DNS管理',
    'Menu:DNSManagement+' => '',
    'Menu:NameSpace' => '名称空间',
    'Menu:NameSpace+' => '所有DNS对象的摘要',
    'Menu:DNSSpace:MainObjects' => '结构对象',
    'Title:Zones:DirectMapping' => '正向区域',
    'Title:Zones:V4ReverseMapping' => 'IPv4反向区域',
    'Title:Zones:V6ReverseMapping' => 'IPv6反向区域',
    'Menu:DNSSpace:ResourceRecords' => '常见资源记录',
    'Menu:DNSSpace:SecurityResourceRecords' => '安全资源记录',
    'Menu:DNSSpace:GenericResourceRecords' => '通用资源记录',
    'Menu:View' => '视图',
    'Menu:View+' => '所有DNS视图的列表',
    'Menu:Domain' => '域',
    'Menu:Domain+' => '所有DNS域的列表',
    'Menu:Zone' => '区域',
    'Menu:Zone+' => '所有DNS区域的列表',
    'Menu:ZoneManagement:ResourceRecords' => '资源记录',
    'Menu:ZoneManagement:ResourceRecords+' => 'DNS资源记录',
    'Menu:NewResourceRecord' => '新RR',
    'Menu:NewResourceRecord+' => '创建新的DNS资源记录',
    'Menu:SearchResourceRecord' => '搜索RR',
    'Menu:SearchResourceRecord+' => '搜索DNS资源记录',
    'Menu:ARecord' => 'A',
    'Menu:ARecord+' => '所有A记录的列表',
    'Menu:AAAARecord' => 'AAAA',
    'Menu:AAAARecord+' => '所有AAAA记录的列表',
    'Menu:CAARecord' => 'CAA',
    'Menu:CAARecord+' => '所有CAA记录的列表',
    'Menu:CNAMERecord' => 'CNAME',
    'Menu:CNAMERecord+' => '所有CNAME记录的列表',
    'Menu:DSRecord' => 'DS',
    'Menu:DSRecord+' => '所有DS记录的列表',
    'Menu:MXRecord' => 'MX',
    'Menu:MXRecord+' => '所有MX记录的列表',
    'Menu:NSRecord' => 'NS',
    'Menu:NSRecord+' => '所有NS记录的列表',
    'Menu:OPENPGPKEYRecord' => 'OPENPGPKEY',
    'Menu:OPENPGPKEYRecord+' => '所有OPENPGPKEY记录的列表',
    'Menu:PTRRecord' => 'PTR',
    'Menu:PTRRecord+' => '所有PTR记录的列表',
    'Menu:SOARecord' => 'SOA',
    'Menu:SOARecord+' => '所有SOA记录的列表',
    'Menu:SRVRecord' => 'SRV',
    'Menu:SRVRecord+' => '所有SRV记录的列表',
    'Menu:SSHFPRecord' => 'SSHFP',
    'Menu:SSHFPRecord+' => '所有SSHFP记录的列表',
    'Menu:TLSARecord' => 'TLSA',
    'Menu:TLSARecord+' => '所有TLSA记录的列表',
	'Menu:TXTRecord' => 'TXT',
	'Menu:TXTRecord+' => 'List of all TXT Records',
	'Menu:GenericRecord' => 'GENERIC',
	'Menu:GenericRecord+' => 'List of all generic or custom Records',
));
