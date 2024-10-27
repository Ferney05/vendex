# Script de backup automático para MySQL
# Guardar como: C:\Scripts\BackupMySQL.ps1

# Crear carpeta de logs si no existe
$logPath = "C:\Scripts\logs"
if (-not (Test-Path -Path $logPath)) {
    New-Item -ItemType Directory -Path $logPath | Out-Null
}

# Configurar log
$logFile = Join-Path $logPath "backup_log.txt"
function Write-Log {
    param($Message)
    $logMessage = "$(Get-Date -Format 'yyyy-MM-dd HH:mm:ss'): $Message"
    Add-Content $logFile $logMessage
    Write-Host $logMessage
}

try {
    # Crear timestamp para el nombre del archivo
    $timestamp = Get-Date -Format "yyyyMMddHHmmss"
    
    # Verificar si existe la carpeta de backup
    $backupPath = "C:\xampp\htdocs\vendex\backup"
    if (-not (Test-Path -Path $backupPath)) {
        New-Item -ItemType Directory -Path $backupPath | Out-Null
        Write-Log "Carpeta de backup creada: $backupPath"
    }
    
    # Definir archivo de backup
    $backupFile = Join-Path $backupPath "backup_$timestamp.sql"
    
    # Ejecutar el backup
    Write-Log "Iniciando backup de la base de datos vendex..."
    & "C:\xampp\mysql\bin\mysqldump.exe" -u root -p"" vendex > $backupFile
    
    # Verificar si el backup se creó correctamente
    if (Test-Path $backupFile) {
        $fileSize = (Get-Item $backupFile).Length / 1MB
        Write-Log "Backup completado exitosamente. Tamaño: $([math]::Round($fileSize, 2)) MB"
        
        # Eliminar backups antiguos (mantener solo los últimos 7 días)
        $oldBackups = Get-ChildItem $backupPath -Filter "backup_*.sql" | 
                     Where-Object { $_.LastWriteTime -lt (Get-Date).AddDays(-7) }
        foreach ($oldBackup in $oldBackups) {
            Remove-Item $oldBackup.FullName -Force
            Write-Log "Backup antiguo eliminado: $($oldBackup.Name)"
        }
    } else {
        throw "El archivo de backup no se creó correctamente"
    }
} catch {
    Write-Log "ERROR: $($_.Exception.Message)"
    exit 1
}