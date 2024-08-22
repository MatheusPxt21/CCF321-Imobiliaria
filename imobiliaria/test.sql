-- Insert into corretores
INSERT INTO imobiliaria.corretores (email, senha, nome, descricao, created_at, updated_at)
VALUES
    ('corretor1@example.com', 'senha1', 'Corretor 1', 'Descrição do Corretor 1', NOW(), NOW()),
    ('corretor2@example.com', 'senha2', 'Corretor 2', 'Descrição do Corretor 2', NOW(), NOW()),
    ('corretor3@example.com', 'senha3', 'Corretor 3', 'Descrição do Corretor 3', NOW(), NOW()),
    ('corretor4@example.com', 'senha4', 'Corretor 4', 'Descrição do Corretor 4', NOW(), NOW());

-- Insert into imoveis
INSERT INTO imobiliaria.imoveis (titulo, descricao, tipo_imovel, categorias, valor, corretor_id, created_at, updated_at)
VALUES
    ('Casa Moderna', 'Uma casa moderna com design inovador.', 'Casa', '["Venda", "Luxo"]', 750000.00, 1, NOW(), NOW()),
    ('Apartamento Central', 'Apartamento localizado no centro da cidade.', 'Apartamento', '["Venda", "Urbano"]', 500000.00, 2, NOW(), NOW()),
    ('Espaço Comercial', 'Imóvel comercial em uma área de alto tráfego.', 'Comercial', '["Aluguel", "Comercial"]', NULL, 3, NOW(), NOW()),
    ('Terreno Amplo', 'Terreno amplo e bem localizado.', 'Terreno', '["Venda", "Investimento"]', 300000.00, 4, NOW(), NOW()),
    ('Casa de Campo', 'Casa de campo com vista para as montanhas.', 'Casa', '["Venda", "Rural"]', 450000.00, 1, NOW(), NOW()),
    ('Apartamento Luxuoso', 'Apartamento com acabamento de alto padrão.', 'Apartamento', '["Venda", "Luxo"]', 850000.00, 2, NOW(), NOW()),
    ('Ponto Comercial', 'Ponto comercial em avenida movimentada.', 'Comercial', '["Aluguel", "Comercial"]', NULL, 3, NOW(), NOW()),
    ('Terreno Industrial', 'Terreno em área industrial.', 'Terreno', '["Venda", "Industrial"]', 600000.00, 4, NOW(), NOW()),
    ('Casa Familiar', 'Casa espaçosa, ideal para famílias.', 'Casa', '["Venda", "Residencial"]', 400000.00, 1, NOW(), NOW()),
    ('Apartamento Confortável', 'Apartamento confortável próximo a parques.', 'Apartamento', '["Venda", "Residencial"]', 350000.00, 2, NOW(), NOW());
