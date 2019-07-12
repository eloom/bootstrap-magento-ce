<?php

##eloom.licenca##

$installer = $this;
$installer->startSetup();
$conn = $installer->getConnection();

$regionNameTable = $installer->getTable('directory/country_region_name');
$countryRegionTable = $installer->getTable('directory/country_region');

$regionName = $conn->fetchAll("SELECT * FROM `{$regionNameTable}` WHERE `locale`='pt_BR'");
$countryRegion = $conn->fetchAll("SELECT * FROM `{$countryRegionTable}` WHERE `country_id`='BR'");

if (empty($regionName) and empty($countryRegion)) {
  $installer->run("INSERT INTO `{$countryRegionTable}` (`country_id`, `code`, `default_name`)
                          VALUES ('BR', 'AC', 'Acre');

                    INSERT INTO `{$regionNameTable}` (`locale`, `region_id`, `name`)
                         VALUES ('pt_BR', LAST_INSERT_ID(), 'Acre');

                    INSERT INTO `{$countryRegionTable}` (`country_id`, `code`, `default_name`)
                         VALUES ('BR', 'AL', 'Alagoas');

                    INSERT INTO `{$regionNameTable}` (`locale`, `region_id`, `name`) 
                         VALUES ('pt_BR', LAST_INSERT_ID(), 'Alagoas');

                    INSERT INTO `{$countryRegionTable}` (`country_id`, `code`, `default_name`) 
                         VALUES ('BR', 'AP', 'Amapá');

                    INSERT INTO `{$regionNameTable}` (`locale`, `region_id`, `name`) 
                         VALUES ('pt_BR', LAST_INSERT_ID(), 'Amapá');

                    INSERT INTO `{$countryRegionTable}` (`country_id`, `code`, `default_name`) 
                         VALUES ('BR', 'AM', 'Amazonas');

                    INSERT INTO `{$regionNameTable}` (`locale`, `region_id`, `name`) 
                         VALUES ('pt_BR', LAST_INSERT_ID(), 'Amazonas');

                    INSERT INTO `{$countryRegionTable}` (`country_id`, `code`, `default_name`) 
                         VALUES ('BR', 'BA', 'Bahia');

                    INSERT INTO `{$regionNameTable}` (`locale`, `region_id`, `name`) 
                         VALUES ('pt_BR', LAST_INSERT_ID(), 'Bahia');

                    INSERT INTO `{$countryRegionTable}` (`country_id`, `code`, `default_name`)
                         VALUES ('BR', 'CE', 'Ceará');

                    INSERT INTO `{$regionNameTable}` (`locale`, `region_id`, `name`)
                         VALUES ('pt_BR', LAST_INSERT_ID(), 'Ceará');

                    INSERT INTO `{$countryRegionTable}` (`country_id`, `code`, `default_name`)
                         VALUES ('BR', 'DF', 'Distrito Federal');

                    INSERT INTO `{$regionNameTable}` (`locale`, `region_id`, `name`)
                         VALUES ('pt_BR', LAST_INSERT_ID(), 'Distrito Federal');

                    INSERT INTO `{$countryRegionTable}` (`country_id`, `code`, `default_name`)
                         VALUES ('BR', 'ES', 'Espírito Santo');

                    INSERT INTO `{$regionNameTable}` (`locale`, `region_id`, `name`)
                         VALUES ('pt_BR', LAST_INSERT_ID(), 'Espírito Santo');

                    INSERT INTO `{$countryRegionTable}` (`country_id`, `code`, `default_name`)
                         VALUES ('BR', 'GO', 'Goiás');

                    INSERT INTO `{$regionNameTable}` (`locale`, `region_id`, `name`)
                         VALUES ('pt_BR', LAST_INSERT_ID(), 'Goiás');

                    INSERT INTO `{$countryRegionTable}` (`country_id`, `code`, `default_name`)
                         VALUES ('BR', 'MA', 'Maranhão');

                    INSERT INTO `{$regionNameTable}` (`locale`, `region_id`, `name`)
                         VALUES ('pt_BR', LAST_INSERT_ID(), 'Maranhão');

                    INSERT INTO `{$countryRegionTable}` (`country_id`, `code`, `default_name`)
                         VALUES ('BR', 'MT', 'Mato Grosso');

                    INSERT INTO `{$regionNameTable}` (`locale`, `region_id`, `name`)
                         VALUES ('pt_BR', LAST_INSERT_ID(), 'Mato Grosso');

                    INSERT INTO `{$countryRegionTable}` (`country_id`, `code`, `default_name`)
                         VALUES ('BR', 'MS', 'Mato Grosso do Sul');

                    INSERT INTO `{$regionNameTable}` (`locale`, `region_id`, `name`)
                         VALUES ('pt_BR', LAST_INSERT_ID(),'Mato Grosso do Sul');

                    INSERT INTO `{$countryRegionTable}` (`country_id`, `code`, `default_name`)
                         VALUES ('BR', 'MG', 'Minas Gerais');

                    INSERT INTO `{$regionNameTable}` (`locale`, `region_id`, `name`)
                         VALUES ('pt_BR', LAST_INSERT_ID(), 'Minas Gerais');

                    INSERT INTO `{$countryRegionTable}` (`country_id`, `code`, `default_name`)
                         VALUES ('BR', 'PA', 'Pará');

                    INSERT INTO `{$regionNameTable}` (`locale`, `region_id`, `name`)
                         VALUES ('pt_BR', LAST_INSERT_ID(), 'Pará');

                    INSERT INTO `{$countryRegionTable}` (`country_id`, `code`, `default_name`)
                         VALUES ('BR', 'PB', 'Paraíba');

                    INSERT INTO `{$regionNameTable}` (`locale`, `region_id`, `name`)
                         VALUES ('pt_BR', LAST_INSERT_ID(), 'Paraíba');

                    INSERT INTO `{$countryRegionTable}` (`country_id`, `code`, `default_name`)
                         VALUES ('BR', 'PR', 'Paraná');

                    INSERT INTO `{$regionNameTable}` (`locale`, `region_id`, `name`)
                         VALUES ('pt_BR', LAST_INSERT_ID(), 'Paraná');

                    INSERT INTO `{$countryRegionTable}` (`country_id`, `code`, `default_name`)
                         VALUES ('BR', 'PE', 'Pernambuco');

                    INSERT INTO `{$regionNameTable}` (`locale`, `region_id`, `name`)
                         VALUES ('pt_BR', LAST_INSERT_ID(),'Pernambuco');

                    INSERT INTO `{$countryRegionTable}` (`country_id`, `code`, `default_name`)
                         VALUES ('BR', 'PI', 'Piauí');

                    INSERT INTO `{$regionNameTable}` (`locale`, `region_id`, `name`)
                         VALUES ('pt_BR', LAST_INSERT_ID(), 'Piauí');

                    INSERT INTO `{$countryRegionTable}` (`country_id`, `code`, `default_name`)
                         VALUES ('BR', 'RJ', 'Rio de Janeiro');

                    INSERT INTO `{$regionNameTable}` (`locale`, `region_id`, `name`)
                         VALUES ('pt_BR', LAST_INSERT_ID(), 'Rio de	Janeiro');

                    INSERT INTO `{$countryRegionTable}` (`country_id`, `code`, `default_name`)
                         VALUES ('BR', 'RN', 'Rio Grande do Norte');

                    INSERT INTO `{$regionNameTable}` (`locale`, `region_id`, `name`)
                         VALUES ('pt_BR', LAST_INSERT_ID(),'Rio Grande do Norte');

                    INSERT INTO `{$countryRegionTable}` (`country_id`, `code`, `default_name`)
                         VALUES ('BR', 'RS', 'Rio Grande do Sul');

                    INSERT INTO `{$regionNameTable}` (`locale`, `region_id`, `name`)
                         VALUES ('pt_BR', LAST_INSERT_ID(), 'Rio Grande do Sul');

                    INSERT INTO `{$countryRegionTable}` (`country_id`, `code`, `default_name`)
                         VALUES ('BR', 'RO', 'Rondônia');

                    INSERT INTO `{$regionNameTable}` (`locale`, `region_id`, `name`)
                         VALUES ('pt_BR', LAST_INSERT_ID(), 'Rondônia');

                    INSERT INTO `{$countryRegionTable}` (`country_id`, `code`, `default_name`)
                         VALUES ('BR', 'RR', 'Roraima');

                    INSERT INTO `{$regionNameTable}` (`locale`, `region_id`, `name`)
                         VALUES ('pt_BR', LAST_INSERT_ID(), 'Roraima');

                    INSERT INTO `{$countryRegionTable}` (`country_id`, `code`, `default_name`)
                         VALUES ('BR', 'SC', 'Santa Catarina');

                    INSERT INTO `{$regionNameTable}` (`locale`, `region_id`, `name`)
                         VALUES ('pt_BR', LAST_INSERT_ID(), 'Santa Catarina');

                    INSERT INTO `{$countryRegionTable}` (`country_id`, `code`, `default_name`)
                         VALUES ('BR', 'SP', 'São Paulo');

                    INSERT INTO `{$regionNameTable}` (`locale`, `region_id`, `name`)
                         VALUES ('pt_BR', LAST_INSERT_ID(), 'São Paulo');

                    INSERT INTO `{$countryRegionTable}` (`country_id`, `code`, `default_name`)
                         VALUES ('BR', 'SE', 'Sergipe');

                    INSERT INTO `{$regionNameTable}` (`locale`, `region_id`, `name`)
                         VALUES ('pt_BR', LAST_INSERT_ID(), 'Sergipe');

                    INSERT INTO `{$countryRegionTable}` (`country_id`, `code`, `default_name`)
                         VALUES ('BR', 'TO', 'Tocantins');

                    INSERT INTO `{$regionNameTable}` (`locale`, `region_id`, `name`)
                         VALUES ('pt_BR', LAST_INSERT_ID(), 'Tocantins');
    ");
}

$installer->endSetup();
