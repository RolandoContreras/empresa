function consul_upline(e) {
    bootbox.dialog("¿Desea Agregar el Producto?", [{
        label: "Cancelar"
    }, {
        label: "Agregar",
        "class": "btn-success",
        callback: function() {
            $.ajax({
                type: "post",
                url: site + "register/consulta_upline/",
                dataType: "json",
                data: {product_id: e
                },
                success: function(e) {
                    bootbox.dialog("Producto Agregado", [{
                        label: "Cerrar"
                    }]);
                    t.stop();
                }
            })
        }
    }])
};

function registrar() {
    kit = $("#kit").val();
    first_name = $("#first_name").val();
    last_name = $("#last_name").val();
    birth_date = $("#birth_date").val();
    dni = $("#dni").val();
    phone = $("#phone").val();
    mobile = $("#mobile").val();
    address = $("#address").val();
    city = $("#city").val();
    department = $("#department").val();
    country = $("#country").val();
    email = $("#email").val();
    password = $("#password").val();
    references = $("#references").val();
    razon_social = $("#razon_social").val();
    ruc = $("#ruc").val();
    address2 = $("#address2").val();
    sub_total = $("#sub_total").val();
    
    n = $("#spinner").get(0);
        bootbox.dialog("¿Desea enviar el Registro?", [{
            label: "Cancelar"
        }, {
            label: "Enviar",
            "class": "btn-success",
            callback: function() {
                t = (new Spinner(opts)).spin(n);
                $.ajax({
                    type: "post",
                    url: site + "registro/crear_cliente",
                    dataType: "json",
                    data: {
                        kit: kit,
                        first_name: first_name,
                        last_name: last_name,
                        dni: dni,
                        birth_date: birth_date,
                        phone: phone,
                        mobile: mobile,
                        address: address,
                        city: city,
                        department: department,
                        country: country,
                        email: email,
                        password: password,
                        razon_social: razon_social,
                        ruc: ruc,
                        address2: address2,
                        references: references,
                        sub_total: sub_total
                    },
                    success: function(e) {
                        if (e.message == "no_item") {
                            bootbox.dialog(e.print, [{
                                label: "Cerrar"
                            }]);
                        } else if (e.message == "no_stock") {
                            bootbox.dialog(e.print, [{
                                label: "Cerrar"
                            }]);
                        }  else if (e.message == "enoge_money") {
                            bootbox.dialog(e.print, [{
                                label: "Cerrar"
                            }]);
                        
                        } else {
                            bootbox.dialog(e.print, [{
                                label: "Cerrar"
                            }]);
                        }
                        t.stop();
                    }
                });
            }
        }]);
}

function delete_car(e) {
    var t = null;
    var n = 0;
    n = $("#spinner").get(0);
    bootbox.dialog("¿Confirma que desea Eliminar el Producto?", [{
        label: "Cancelar"
    }, {
        label: "Eliminar",
        "class": "btn-danger",
        callback: function() {
            t = (new Spinner(opts)).spin(n);
            $.ajax({
                type: "post",
                url: site + "home/delete_car",
                dataType: "json",
                data: {
                    row_id: e
                },
                success: function(e) {
                    location.reload()
                }
            })
        }
    }])
}

function empty_car() {
    var e = null;
    var t = 0;
    t = $("#spinner").get(0);
    bootbox.dialog("¿Desea limpiar el carrito?", [{
        label: "Cancelar"
    }, {
        label: "Limpiar",
        "class": "btn-danger",
        callback: function() {
            e = (new Spinner(opts)).spin(t);
            $.ajax({
                type: "post",
                url: site + "home/empty_car",
                dataType: "json",
                success: function() {
                    bootbox.dialog("Carrito Vacio", []);
                    location.reload()
                }
            })
        }
    }])
}

function make_order() {
    var e = null;
    var t = 0;
    t = $("#spinner").get(0);
    bootbox.dialog("¿Desea hacer el pedido?", [{
        label: "Cancelar"
    }, {
        label: "Enviar",
        "class": "btn-danger",
        callback: function() {
            e = (new Spinner(opts)).spin(t);
            $.ajax({
                type: "post",
                url: site + "checkout/hacer_pedido",
                dataType: "json",
                success: function(t) {
                    if (t.message == "no_customer") {
                        bootbox.dialog(t.print, [{
                            label: "Cerrar"
                        }])
                    } else if (t.message == "no_stock") {
                        bootbox.dialog(t.print, [{
                            label: "Cerrar"
                        }])
                    } else {
                        bootbox.dialog(t.print, [{
                            label: "Cerrar"
                        }])
                    }
                    e.stop()
                }
            })
        }
    }])
}