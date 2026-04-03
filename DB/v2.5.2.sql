Insert INTO `landing_pages` ( `name`, `code`, `data`, `status`, `created_at`, `updated_at`, `short`, `locale`) VALUES
('Loan Calculator Section\r\n', 'loancalculatorsection', '{\"title_small\":\"Loan Calculator\",\"title_big\":\"Bank Loan Calculator\"}', 1, '2022-10-22 13:54:48', '2024-06-07 06:26:56', 5, 'en');
ALTER TABLE `reward_point_redeems`
MODIFY COLUMN `amount` DECIMAL(8,2) NOT NULL;

ALTER TABLE `others_banks`
MODIFY COLUMN `maximum_transfer` DECIMAL(12,2) NOT NULL;

INSERT INTO `permissions` (`category`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
('Customer Management', 'customer-create', 'admin', '2024-11-10 03:46:34', '2024-11-10 03:46:34'),
('Customer Management', 'customer-edit', 'admin', '2024-11-10 03:46:34', '2024-11-10 03:46:34'),
('Customer Management', 'customer-delete', 'admin', '2024-11-10 03:46:34', '2024-11-10 03:46:34');

UPDATE `gateways` SET `supported_currencies` = '["USD","EUR","GBP","NGN","GHS","KES","ZAR","UGX","TZS","RWF","CAD","AUD","JPY","INR","XAF","CLP","COP","EGP","GNF","MWK","MAD","SLL","STD","XOF","ZMW"
]' WHERE `gateways`.`id` = 8;
