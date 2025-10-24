# Auto Docs Simple - Demo

## 🎯 Objetivo
Demostrar documentación automática **súper simple** que funciona al 100%.

## 🔄 Flujo
1. Desarrollador hace cambios en API
2. Hace merge a `main`
3. **GitHub Actions genera documentación automáticamente**
4. Documentación disponible como descarga

## 🧪 Probar Localmente
```bash
# Iniciar servidor PHP
cd api
php -S localhost:8000

# Probar endpoints
curl http://localhost:8000/?route=students
curl http://localhost:8000/?route=teachers
```

## 📚 Documentación Automática
- Se genera en cada merge a `main`
- Disponible como artifact en GitHub Actions
- Contiene todos los endpoints actualizados

## 👥 Equipo Bit Technologies
- **Backend:** Emmanuel, Josué
- **Frontend:** Jonathan  
- **Mobile:** Edgar
- **Diseño:** Edin