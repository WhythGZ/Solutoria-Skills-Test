import requests
import mysql.connector

auth_token='eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiJQb3N0dWxhY2lvbmVzSldUU2VydmljZUFjY2Vzc1Rva2VuIiwianRpIjoiYmM1MzdjZjAtMWQxMi00MTAxLWFmZGMtYzE3YzJkMjEyNjViIiwiaWF0IjoiNC8xMi8yMDIzIDExOjIyOjE0IFBNIiwiVXNlcklkIjoiSWQiLCJEaXNwbGF5TmFtZSI6IlBvc3R1bGFudGUgMjAyMzA0IiwiVXNlck5hbWUiOiJhbGlnb256YWxlenFydXR4dF9qYWNAaW5kZWVkZW1haWwuY29tIiwiRW1haWwiOiJhbGlnb256YWxlenFydXR4dF9qYWNAaW5kZWVkZW1haWwuY29tIiwiZXhwIjoxNjgxMzU2NDM0LCJpc3MiOiJodHRwczovL3NvbHV0b3JpYS5jbC8iLCJhdWQiOiJKV1RTZXJ2aWNlUG9zdHVsYW50ZSJ9.Pe3cozod_3awVfQn9jbTpH_U_WRhQJIAzKhHH7CWj9Q'

header = {'Authorization': 'Bearer ' + auth_token}
url = 'https://postulaciones.solutoria.cl/api/indicadores'
response = requests.get(url=url, headers=header)
print(response)

data = response.json()

conexion = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="solutoria"
)

cursor = conexion.cursor()

for indicador in data:
    nombreIndicador = indicador['nombreIndicador']
    codigoIndicador = indicador['codigoIndicador']
    unidadMedidaIndicador = indicador['unidadMedidaIndicador']
    valorIndicador = indicador['valorIndicador']
    fechaIndicador = indicador['fechaIndicador']
    tiempoIndicador = indicador['tiempoIndicador']
    origenIndicador = indicador['origenIndicador']
    consulta = "INSERT INTO indicadores (nombreIndicador, codigoIndicador, unidadMedidaIndicador, valorIndicador, fechaIndicador, tiempoIndicador, origenIndicador) VALUES (%s, %s, %s, %s, %s, %s, %s)"
    valores = (nombreIndicador, codigoIndicador, unidadMedidaIndicador, valorIndicador, fechaIndicador, tiempoIndicador, origenIndicador)
    cursor.execute(consulta, valores)
    conexion.commit()

cursor.close()
conexion.close()