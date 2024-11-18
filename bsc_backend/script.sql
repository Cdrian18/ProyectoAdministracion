CREATE TABLE perspectives (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT
);
CREATE TABLE objectives (
    id SERIAL PRIMARY KEY,
    perspective_id INT REFERENCES perspectives(id) ON DELETE CASCADE,
    name VARCHAR(100) NOT NULL,
    description TEXT
);
CREATE TABLE metrics (
    id SERIAL PRIMARY KEY,
    objective_id INT REFERENCES objectives(id) ON DELETE CASCADE,
    name VARCHAR(100) NOT NULL,
    unit VARCHAR(20),
    target_value NUMERIC NOT NULL,
    description TEXT
);
CREATE TABLE kpi_updates (
    id SERIAL PRIMARY KEY,
    metric_id INT REFERENCES metrics(id) ON DELETE CASCADE,
    actual_value NUMERIC NOT NULL,
    update_date DATE DEFAULT CURRENT_DATE
);


INSERT INTO perspectives (id, name, description) VALUES
(1, 'Procesos', 'Perspectiva enfocada en la mejora y optimización de los procesos internos de la organización.'),
(2, 'Clientes', 'Perspectiva que prioriza la satisfacción y fidelización de los clientes.'),
(3, 'Financiera', 'Perspectiva centrada en los objetivos económicos y de rentabilidad de la empresa.');


CREATE TABLE organization (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    mission TEXT NOT NULL,
    vision TEXT NOT NULL
);

-- Insertar datos iniciales para la organización
INSERT INTO organization (name, mission, vision) VALUES 
('TechVision Consulting', 
 'Proveer soluciones tecnológicas y estrategias innovadoras que impulsen la transformación digital de las empresas, garantizando resultados efectivos y sostenibles.', 
 'Ser líderes globales en consultoría tecnológica, reconocidos por nuestra excelencia en innovación y compromiso con el crecimiento empresarial de nuestros clientes.');

INSERT INTO objectives (perspective_id, name, description) VALUES
(1, 'Optimización de procesos', 'Reducir el tiempo y costo de los procesos internos mediante automatización.'),
(1, 'Eficiencia operativa', 'Aumentar la productividad en las operaciones clave de la organización.'),
(2, 'Satisfacción del cliente', 'Mejorar la experiencia del cliente mediante la personalización y el servicio rápido.'),
(2, 'Fidelización del cliente', 'Aumentar la tasa de retención de clientes en un 20%.'),
(3, 'Crecimiento de ingresos', 'Incrementar los ingresos en un 15% anual.'),
(3, 'Gestión de costos', 'Reducir los costos operativos en un 10%.');

INSERT INTO metrics (objective_id, name, unit, target_value, description) VALUES
(1, 'Tiempo de procesamiento', 'minutos', 30, 'Reducir el tiempo promedio de procesamiento de tareas.'),
(1, 'Costo por proceso', 'USD', 500, 'Disminuir el costo promedio por proceso automatizado.'),
(2, 'Productividad por empleado', 'unidades/mes', 100, 'Aumentar el número promedio de unidades producidas por empleado.'),
(3, 'Calificación de satisfacción', 'puntos', 90, 'Incrementar la calificación promedio en encuestas de satisfacción.'),
(4, 'Tasa de retención de clientes', '%', 80, 'Aumentar la retención de clientes a través de incentivos y promociones.'),
(5, 'Ingresos totales', 'USD', 100000, 'Incrementar los ingresos brutos trimestrales en comparación con el año pasado.'),
(6, 'Costo operativo promedio', 'USD', 10000, 'Reducir el costo promedio de las operaciones principales.');


INSERT INTO perspectives (id,name,description) VALUES
(4,'Innovación y Aprendizaje', 'Fomentar la creatividad, el aprendizaje continuo y la mejora en los procesos para garantizar la sostenibilidad y el crecimiento organizacional.');

