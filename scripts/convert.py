# import xml element tree
import xml.etree.ElementTree as ET
  
# import mysql connector
import mysql.connector
  
# database
conn = mysql.connector.connect(user='root', 
                               password='', 
                               host='localhost', 
                               database='planificador')

# reading xml file
tree = ET.parse('data/restaurantes.xml')

data = tree.findall('service')

index = 0
for d in data:
    index += 1
    bd = d.find('basicData')
    
    name = bd.find("name").text
    desc = bd.find('body').text
    url = bd.find('web').text
    email = bd.find('email').text
    phone = bd.find('phone').text

    gd = d.find('geoData')
    
    dir = gd.find('address').text
    cp = gd.find('zipcode').text
    lat = gd.find('latitude').text
    long = gd.find('longitude').text

    ed = d.find('extradata')
   
    items = ed.findall('item')
    horario = items[3].text

    # # # # # # sql query to insert data into database
    sql = """INSERT INTO restaurantes(id, nombre, telefono, email, descripcion, horario, url, direccion, codpostal, latitud, longitud) VALUES(%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)"""
    # creating the cursor object
    c = conn.cursor() 
    # executing cursor object
    c.execute(sql, (index, name, phone, email, desc, horario, url, dir, cp, lat, long))

    if(ed.find('categorias')):
        categorias = ed.find('categorias').findall('categoria')
        for categoria in categorias:
            cat= categoria.findall('item')[1].text
            # # # # # sql query to insert data into database
            sql = """SELECT id FROM categorias_restaurantes WHERE categoria = '%s'""" %cat
            c = conn.cursor()
            c.execute(sql)
            id = c.fetchone()

            sql = """INSERT INTO relacion_categorias_restaurantes(id_categoria, id_restaurante) VALUES(%s,%s)"""
            c = conn.cursor()
            c.execute(sql, (id[0], index))
            conn.commit()

            if(categoria.find('subcategorias')):
                subcategorias = categoria.find('subcategorias').findall('subcategoria')
                for subcategoria in subcategorias:
                    sub= subcategoria.findall('item')[1].text
                    sql = """SELECT id FROM subcategorias_restaurantes WHERE subcategoria = '%s'""" %sub
                    c = conn.cursor()
                    c.execute(sql)
                    id = c.fetchone()

                    sql = """INSERT INTO relacion_subcategorias_restaurantes(id_subcategoria, id_restaurante) VALUES(%s,%s)"""
                    c = conn.cursor()
                    c.execute(sql, (id[0], index))
                    conn.commit()


    md = d.find('multimedia')
    media = md.findall('media')
    for img in media:
        imagen= img.find('url').text
        # # # # # # sql query to insert data into database
        sql = """INSERT INTO restaurantes_imagenes(id_restaurante, imagen) VALUES(%s,%s)"""
        # creating the cursor object
        c = conn.cursor()
        # executing cursor object
        c.execute(sql, (index, imagen))
        conn.commit()
