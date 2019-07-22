<?php
$installer = $this;
$installer->startSetup();
$conn = $installer->getConnection();


if (!$conn->tableColumnExists($this->getTable('directory/country'), 'ddi')) {
    $installer->run("ALTER TABLE {$this->getTable('directory/country')} ADD `ddi` VARCHAR(2) NULL");
}

$installer->run("UPDATE directory_country SET ddi = 93	WHERE country_id = 'AF';
								UPDATE directory_country SET ddi = 355	WHERE country_id = 'AL';
								UPDATE directory_country SET ddi = 213	WHERE country_id = 'DZ';
								UPDATE directory_country SET ddi = 1	WHERE country_id = 'AS';
								UPDATE directory_country SET ddi = 376	WHERE country_id = 'AD';
								UPDATE directory_country SET ddi = 244	WHERE country_id = 'AO';
								UPDATE directory_country SET ddi = 1	WHERE country_id = 'AI';
								UPDATE directory_country SET ddi = 672	WHERE country_id = 'AQ';
								UPDATE directory_country SET ddi = 1	WHERE country_id = 'AG';
								UPDATE directory_country SET ddi = 54	WHERE country_id = 'AR';
								UPDATE directory_country SET ddi = 374	WHERE country_id = 'AM';
								UPDATE directory_country SET ddi = 297	WHERE country_id = 'AW';
								UPDATE directory_country SET ddi = 61	WHERE country_id = 'AU';
								UPDATE directory_country SET ddi = 43	WHERE country_id = 'AT';
								UPDATE directory_country SET ddi = 994	WHERE country_id = 'AZ';
								UPDATE directory_country SET ddi = 1	WHERE country_id = 'BS';
								UPDATE directory_country SET ddi = 973	WHERE country_id = 'BH';
								UPDATE directory_country SET ddi = 880	WHERE country_id = 'BD';
								UPDATE directory_country SET ddi = 1	WHERE country_id = 'BB';
								UPDATE directory_country SET ddi = 375	WHERE country_id = 'BY';
								UPDATE directory_country SET ddi = 32	WHERE country_id = 'BE';
								UPDATE directory_country SET ddi = 501	WHERE country_id = 'BZ';
								UPDATE directory_country SET ddi = 229	WHERE country_id = 'BJ';
								UPDATE directory_country SET ddi = 1	WHERE country_id = 'BM';
								UPDATE directory_country SET ddi = 975	WHERE country_id = 'BT';
								UPDATE directory_country SET ddi = 591	WHERE country_id = 'BO';
								UPDATE directory_country SET ddi = 387	WHERE country_id = 'BA';
								UPDATE directory_country SET ddi = 267	WHERE country_id = 'BW';
								UPDATE directory_country SET ddi = 55	WHERE country_id = 'BR';
								UPDATE directory_country SET ddi = 246	WHERE country_id = 'IO';
								UPDATE directory_country SET ddi = 1	WHERE country_id = 'VG';
								UPDATE directory_country SET ddi = 673	WHERE country_id = 'BN';
								UPDATE directory_country SET ddi = 359	WHERE country_id = 'BG';
								UPDATE directory_country SET ddi = 226	WHERE country_id = 'BF';
								UPDATE directory_country SET ddi = 257	WHERE country_id = 'BI';
								UPDATE directory_country SET ddi = 855	WHERE country_id = 'KH';
								UPDATE directory_country SET ddi = 237	WHERE country_id = 'CM';
								UPDATE directory_country SET ddi = 1	WHERE country_id = 'CA';
								UPDATE directory_country SET ddi = 238	WHERE country_id = 'CV';
								UPDATE directory_country SET ddi = 1	WHERE country_id = 'KY';
								UPDATE directory_country SET ddi = 236	WHERE country_id = 'CF';
								UPDATE directory_country SET ddi = 235	WHERE country_id = 'TD';
								UPDATE directory_country SET ddi = 56	WHERE country_id = 'CL';
								UPDATE directory_country SET ddi = 86	WHERE country_id = 'CN';
								UPDATE directory_country SET ddi = 61	WHERE country_id = 'CX';
								UPDATE directory_country SET ddi = 61	WHERE country_id = 'CC';
								UPDATE directory_country SET ddi = 57	WHERE country_id = 'CO';
								UPDATE directory_country SET ddi = 269	WHERE country_id = 'KM';
								UPDATE directory_country SET ddi = 682	WHERE country_id = 'CK';
								UPDATE directory_country SET ddi = 506	WHERE country_id = 'CR';
								UPDATE directory_country SET ddi = 385	WHERE country_id = 'HR';
								UPDATE directory_country SET ddi = 53	WHERE country_id = 'CU';
								UPDATE directory_country SET ddi = 599	WHERE country_id = 'CW';
								UPDATE directory_country SET ddi = 357	WHERE country_id = 'CY';
								UPDATE directory_country SET ddi = 420	WHERE country_id = 'CZ';
								UPDATE directory_country SET ddi = 243	WHERE country_id = 'CD';
								UPDATE directory_country SET ddi = 45	WHERE country_id = 'DK';
								UPDATE directory_country SET ddi = 253	WHERE country_id = 'DJ';
								UPDATE directory_country SET ddi = 1	WHERE country_id = 'DM';
								UPDATE directory_country SET ddi = 1	WHERE country_id = 'DO';
								UPDATE directory_country SET ddi = 670	WHERE country_id = 'TL';
								UPDATE directory_country SET ddi = 593	WHERE country_id = 'EC';
								UPDATE directory_country SET ddi = 20	WHERE country_id = 'EG';
								UPDATE directory_country SET ddi = 503	WHERE country_id = 'SV';
								UPDATE directory_country SET ddi = 240	WHERE country_id = 'GQ';
								UPDATE directory_country SET ddi = 291	WHERE country_id = 'ER';
								UPDATE directory_country SET ddi = 372	WHERE country_id = 'EE';
								UPDATE directory_country SET ddi = 251	WHERE country_id = 'ET';
								UPDATE directory_country SET ddi = 500	WHERE country_id = 'FK';
								UPDATE directory_country SET ddi = 298	WHERE country_id = 'FO';
								UPDATE directory_country SET ddi = 679	WHERE country_id = 'FJ';
								UPDATE directory_country SET ddi = 358	WHERE country_id = 'FI';
								UPDATE directory_country SET ddi = 33	WHERE country_id = 'FR';
								UPDATE directory_country SET ddi = 689	WHERE country_id = 'PF';
								UPDATE directory_country SET ddi = 241	WHERE country_id = 'GA';
								UPDATE directory_country SET ddi = 220	WHERE country_id = 'GM';
								UPDATE directory_country SET ddi = 995	WHERE country_id = 'GE';
								UPDATE directory_country SET ddi = 49	WHERE country_id = 'DE';
								UPDATE directory_country SET ddi = 233	WHERE country_id = 'GH';
								UPDATE directory_country SET ddi = 350	WHERE country_id = 'GI';
								UPDATE directory_country SET ddi = 30	WHERE country_id = 'GR';
								UPDATE directory_country SET ddi = 299	WHERE country_id = 'GL';
								UPDATE directory_country SET ddi = 1	WHERE country_id = 'GD';
								UPDATE directory_country SET ddi = 1	WHERE country_id = 'GU';
								UPDATE directory_country SET ddi = 502	WHERE country_id = 'GT';
								UPDATE directory_country SET ddi = 44	WHERE country_id = 'GG';
								UPDATE directory_country SET ddi = 224	WHERE country_id = 'GN';
								UPDATE directory_country SET ddi = 245	WHERE country_id = 'GW';
								UPDATE directory_country SET ddi = 592	WHERE country_id = 'GY';
								UPDATE directory_country SET ddi = 509	WHERE country_id = 'HT';
								UPDATE directory_country SET ddi = 504	WHERE country_id = 'HN';
								UPDATE directory_country SET ddi = 852	WHERE country_id = 'HK';
								UPDATE directory_country SET ddi = 36	WHERE country_id = 'HU';
								UPDATE directory_country SET ddi = 354	WHERE country_id = 'IS';
								UPDATE directory_country SET ddi = 91	WHERE country_id = 'IN';
								UPDATE directory_country SET ddi = 62	WHERE country_id = 'ID';
								UPDATE directory_country SET ddi = 98	WHERE country_id = 'IR';
								UPDATE directory_country SET ddi = 964	WHERE country_id = 'IQ';
								UPDATE directory_country SET ddi = 353	WHERE country_id = 'IE';
								UPDATE directory_country SET ddi = 44	WHERE country_id = 'IM';
								UPDATE directory_country SET ddi = 972	WHERE country_id = 'IL';
								UPDATE directory_country SET ddi = 39	WHERE country_id = 'IT';
								UPDATE directory_country SET ddi = 225	WHERE country_id = 'CI';
								UPDATE directory_country SET ddi = 1	WHERE country_id = 'JM';
								UPDATE directory_country SET ddi = 81	WHERE country_id = 'JP';
								UPDATE directory_country SET ddi = 44	WHERE country_id = 'JE';
								UPDATE directory_country SET ddi = 962	WHERE country_id = 'JO';
								UPDATE directory_country SET ddi = 7	WHERE country_id = 'KZ';
								UPDATE directory_country SET ddi = 254	WHERE country_id = 'KE';
								UPDATE directory_country SET ddi = 686	WHERE country_id = 'KI';
								UPDATE directory_country SET ddi = 383	WHERE country_id = 'XK';
								UPDATE directory_country SET ddi = 965	WHERE country_id = 'KW';
								UPDATE directory_country SET ddi = 996	WHERE country_id = 'KG';
								UPDATE directory_country SET ddi = 856	WHERE country_id = 'LA';
								UPDATE directory_country SET ddi = 371	WHERE country_id = 'LV';
								UPDATE directory_country SET ddi = 961	WHERE country_id = 'LB';
								UPDATE directory_country SET ddi = 266	WHERE country_id = 'LS';
								UPDATE directory_country SET ddi = 231	WHERE country_id = 'LR';
								UPDATE directory_country SET ddi = 218	WHERE country_id = 'LY';
								UPDATE directory_country SET ddi = 423	WHERE country_id = 'LI';
								UPDATE directory_country SET ddi = 370	WHERE country_id = 'LT';
								UPDATE directory_country SET ddi = 352	WHERE country_id = 'LU';
								UPDATE directory_country SET ddi = 853	WHERE country_id = 'MO';
								UPDATE directory_country SET ddi = 389	WHERE country_id = 'MK';
								UPDATE directory_country SET ddi = 261	WHERE country_id = 'MG';
								UPDATE directory_country SET ddi = 265	WHERE country_id = 'MW';
								UPDATE directory_country SET ddi = 60	WHERE country_id = 'MY';
								UPDATE directory_country SET ddi = 960	WHERE country_id = 'MV';
								UPDATE directory_country SET ddi = 223	WHERE country_id = 'ML';
								UPDATE directory_country SET ddi = 356	WHERE country_id = 'MT';
								UPDATE directory_country SET ddi = 692	WHERE country_id = 'MH';
								UPDATE directory_country SET ddi = 222	WHERE country_id = 'MR';
								UPDATE directory_country SET ddi = 230	WHERE country_id = 'MU';
								UPDATE directory_country SET ddi = 262	WHERE country_id = 'YT';
								UPDATE directory_country SET ddi = 52	WHERE country_id = 'MX';
								UPDATE directory_country SET ddi = 691	WHERE country_id = 'FM';
								UPDATE directory_country SET ddi = 373	WHERE country_id = 'MD';
								UPDATE directory_country SET ddi = 377	WHERE country_id = 'MC';
								UPDATE directory_country SET ddi = 976	WHERE country_id = 'MN';
								UPDATE directory_country SET ddi = 382	WHERE country_id = 'ME';
								UPDATE directory_country SET ddi = 1	WHERE country_id = 'MS';
								UPDATE directory_country SET ddi = 212	WHERE country_id = 'MA';
								UPDATE directory_country SET ddi = 258	WHERE country_id = 'MZ';
								UPDATE directory_country SET ddi = 95	WHERE country_id = 'MM';
								UPDATE directory_country SET ddi = 264	WHERE country_id = 'NA';
								UPDATE directory_country SET ddi = 674	WHERE country_id = 'NR';
								UPDATE directory_country SET ddi = 977	WHERE country_id = 'NP';
								UPDATE directory_country SET ddi = 31	WHERE country_id = 'NL';
								UPDATE directory_country SET ddi = 599	WHERE country_id = 'AN';
								UPDATE directory_country SET ddi = 687	WHERE country_id = 'NC';
								UPDATE directory_country SET ddi = 64	WHERE country_id = 'NZ';
								UPDATE directory_country SET ddi = 505	WHERE country_id = 'NI';
								UPDATE directory_country SET ddi = 227	WHERE country_id = 'NE';
								UPDATE directory_country SET ddi = 234	WHERE country_id = 'NG';
								UPDATE directory_country SET ddi = 683	WHERE country_id = 'NU';
								UPDATE directory_country SET ddi = 850	WHERE country_id = 'KP';
								UPDATE directory_country SET ddi = 1	WHERE country_id = 'MP';
								UPDATE directory_country SET ddi = 47	WHERE country_id = 'NO';
								UPDATE directory_country SET ddi = 968	WHERE country_id = 'OM';
								UPDATE directory_country SET ddi = 92	WHERE country_id = 'PK';
								UPDATE directory_country SET ddi = 680	WHERE country_id = 'PW';
								UPDATE directory_country SET ddi = 970	WHERE country_id = 'PS';
								UPDATE directory_country SET ddi = 507	WHERE country_id = 'PA';
								UPDATE directory_country SET ddi = 675	WHERE country_id = 'PG';
								UPDATE directory_country SET ddi = 595	WHERE country_id = 'PY';
								UPDATE directory_country SET ddi = 51	WHERE country_id = 'PE';
								UPDATE directory_country SET ddi = 63	WHERE country_id = 'PH';
								UPDATE directory_country SET ddi = 64	WHERE country_id = 'PN';
								UPDATE directory_country SET ddi = 48	WHERE country_id = 'PL';
								UPDATE directory_country SET ddi = 351	WHERE country_id = 'PT';
								UPDATE directory_country SET ddi = 1	WHERE country_id = 'PR';
								UPDATE directory_country SET ddi = 974	WHERE country_id = 'QA';
								UPDATE directory_country SET ddi = 242	WHERE country_id = 'CG';
								UPDATE directory_country SET ddi = 262	WHERE country_id = 'RE';
								UPDATE directory_country SET ddi = 40	WHERE country_id = 'RO';
								UPDATE directory_country SET ddi = 7	WHERE country_id = 'RU';
								UPDATE directory_country SET ddi = 250	WHERE country_id = 'RW';
								UPDATE directory_country SET ddi = 590	WHERE country_id = 'BL';
								UPDATE directory_country SET ddi = 290	WHERE country_id = 'SH';
								UPDATE directory_country SET ddi = 1	WHERE country_id = 'KN';
								UPDATE directory_country SET ddi = 1	WHERE country_id = 'LC';
								UPDATE directory_country SET ddi = 1	WHERE country_id = 'MF';
								UPDATE directory_country SET ddi = 508	WHERE country_id = 'PM';
								UPDATE directory_country SET ddi = 1	WHERE country_id = 'VC';
								UPDATE directory_country SET ddi = 685	WHERE country_id = 'WS';
								UPDATE directory_country SET ddi = 378	WHERE country_id = 'SM';
								UPDATE directory_country SET ddi = 239	WHERE country_id = 'ST';
								UPDATE directory_country SET ddi = 966	WHERE country_id = 'SA';
								UPDATE directory_country SET ddi = 221	WHERE country_id = 'SN';
								UPDATE directory_country SET ddi = 381	WHERE country_id = 'RS';
								UPDATE directory_country SET ddi = 248	WHERE country_id = 'SC';
								UPDATE directory_country SET ddi = 232	WHERE country_id = 'SL';
								UPDATE directory_country SET ddi = 65	WHERE country_id = 'SG';
								UPDATE directory_country SET ddi = 1	WHERE country_id = 'SX';
								UPDATE directory_country SET ddi = 421	WHERE country_id = 'SK';
								UPDATE directory_country SET ddi = 386	WHERE country_id = 'SI';
								UPDATE directory_country SET ddi = 677	WHERE country_id = 'SB';
								UPDATE directory_country SET ddi = 252	WHERE country_id = 'SO';
								UPDATE directory_country SET ddi = 27	WHERE country_id = 'ZA';
								UPDATE directory_country SET ddi = 82	WHERE country_id = 'KR';
								UPDATE directory_country SET ddi = 211	WHERE country_id = 'SS';
								UPDATE directory_country SET ddi = 34	WHERE country_id = 'ES';
								UPDATE directory_country SET ddi = 94	WHERE country_id = 'LK';
								UPDATE directory_country SET ddi = 249	WHERE country_id = 'SD';
								UPDATE directory_country SET ddi = 597	WHERE country_id = 'SR';
								UPDATE directory_country SET ddi = 47	WHERE country_id = 'SJ';
								UPDATE directory_country SET ddi = 268	WHERE country_id = 'SZ';
								UPDATE directory_country SET ddi = 46	WHERE country_id = 'SE';
								UPDATE directory_country SET ddi = 41	WHERE country_id = 'CH';
								UPDATE directory_country SET ddi = 963	WHERE country_id = 'SY';
								UPDATE directory_country SET ddi = 886	WHERE country_id = 'TW';
								UPDATE directory_country SET ddi = 992	WHERE country_id = 'TJ';
								UPDATE directory_country SET ddi = 255	WHERE country_id = 'TZ';
								UPDATE directory_country SET ddi = 66	WHERE country_id = 'TH';
								UPDATE directory_country SET ddi = 228	WHERE country_id = 'TG';
								UPDATE directory_country SET ddi = 690	WHERE country_id = 'TK';
								UPDATE directory_country SET ddi = 676	WHERE country_id = 'TO';
								UPDATE directory_country SET ddi = 1	WHERE country_id = 'TT';
								UPDATE directory_country SET ddi = 216	WHERE country_id = 'TN';
								UPDATE directory_country SET ddi = 90	WHERE country_id = 'TR';
								UPDATE directory_country SET ddi = 993	WHERE country_id = 'TM';
								UPDATE directory_country SET ddi = 1	WHERE country_id = 'TC';
								UPDATE directory_country SET ddi = 688	WHERE country_id = 'TV';
								UPDATE directory_country SET ddi = 1	WHERE country_id = 'VI';
								UPDATE directory_country SET ddi = 256	WHERE country_id = 'UG';
								UPDATE directory_country SET ddi = 380	WHERE country_id = 'UA';
								UPDATE directory_country SET ddi = 971	WHERE country_id = 'AE';
								UPDATE directory_country SET ddi = 44	WHERE country_id = 'GB';
								UPDATE directory_country SET ddi = 1	WHERE country_id = 'US';
								UPDATE directory_country SET ddi = 598	WHERE country_id = 'UY';
								UPDATE directory_country SET ddi = 998	WHERE country_id = 'UZ';
								UPDATE directory_country SET ddi = 678	WHERE country_id = 'VU';
								UPDATE directory_country SET ddi = 39	WHERE country_id = 'VA';
								UPDATE directory_country SET ddi = 58	WHERE country_id = 'VE';
								UPDATE directory_country SET ddi = 84	WHERE country_id = 'VN';
								UPDATE directory_country SET ddi = 681	WHERE country_id = 'WF';
								UPDATE directory_country SET ddi = 212	WHERE country_id = 'EH';
								UPDATE directory_country SET ddi = 967	WHERE country_id = 'YE';
								UPDATE directory_country SET ddi = 260	WHERE country_id = 'ZM';
								UPDATE directory_country SET ddi = 263	WHERE country_id = 'ZW';
								");

$installer->endSetup();