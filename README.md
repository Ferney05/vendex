# Vendex - Sistema Integral de Gestión de Inventarios

## 🌟 Descripción General

Vendex es un sistema de gestión de inventarios profesional, desarrollado específicamente para optimizar operaciones en:
- 🏪 Tiendas minoristas
- 🍽️ Restaurantes
- 🏊 Piscinas
- 🏢 Empresas con necesidades de control de inventario

## ✨ Características Principales

### 📊 Dashboard Analytics
- **Monitoreo de Ventas en Tiempo Real**
  - Comparativa día actual vs anterior
  - Indicadores de rendimiento (KPIs)

### 💰 Gestión Financiera
- **Análisis de Ganancias**
  - Cálculo automático de márgenes
  - Seguimiento de ingresos

### 📦 Control de Inventario
- **Gestión de Stock**
  - Sistema de alertas automáticas
  - Seguimiento de productos populares
  - Control de reposiciones

## 🛠️ Requisitos Técnicos

### Requisitos de Hardware
- Procesador: Intel Core i3 o superior
- RAM: 4GB mínimo (8GB recomendado)
- Almacenamiento: 10GB de espacio libre
- Resolución de pantalla: 1366x768 o superior

### Requisitos de Software
- Sistema Operativo: Windows 10 o superior
- XAMPP (última versión estable)
  - Apache 2.4+
  - MySQL 5.7+
  - PHP 7.4+
- Navegador web moderno
  - Google Chrome (recomendado)
  - Mozilla Firefox
  - Microsoft Edge

## 📥 Instalación

1. **Preparación del Entorno**
```bash
# Instalar XAMPP
# Iniciar servicios de Apache y MySQL
```

2. **Configuración de la Base de Datos**
```sql
-- Crear base de datos
CREATE DATABASE vendex;
-- Importar estructura
mysql -u root -p vendex < estructura.sql
```

3. **Configuración del Sistema**
```php
// Editar archivo conexion.php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'vendex_db');
```

## 📁 Estructura del Proyecto

```
vendex/
├── app/
│   ├── users/  
├── css/
├── js/
├── roles/
│   ├── store/
│   ├── pool/
│   ├── restaurant/
│   ├── dashboard-store.php
│   ├── dashboard-pool.php
│   └── dashboard-restaurant.php
├── svg/
├── conexion.php
└── index.php
```

## 💎 Planes y Licencias

### Plan Básico
- **Precio**: $350,000 COP/mes
- **Incluye**:
  - Funcionalidades base completas
  - Soporte básico
  - Actualizaciones de seguridad

### Plan Premium
- **Precio**: $500,000 COP/mes
- **Incluye**:
  - Todo lo del plan básico
  - Actualizaciones prioritarias
  - Soporte premium
  - Funciones avanzadas

## 🚀 Primeros Pasos

1. Accede al dashboard en `http://localhost/vendex`
2. Inicia sesión con las credenciales proporcionadas
3. Configura tu perfil y preferencias
4. ¡Comienza a gestionar tu inventario!

## 🔐 Seguridad

- Autenticación de dos factores disponible
- Encriptación de datos sensibles
- Registro de actividades
- Copias de seguridad automáticas

## 📞 Soporte y Contacto

- **Email**: [barbosaferney05@gmail.com]
- **Teléfono**: [+57 300 855 7349]
- **Horario**: Lunes a Viernes, 8:00 AM - 6:00 PM

## 🤝 Programa de Referidos

Obtén un 10% de descuento en tu próxima renovación por cada nuevo cliente referido.

## 📄 Licencia

Copyright © 2024 Ferney Barbosa. Todos los derechos reservados.

---

