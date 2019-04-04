function excluirDestaque(id) {

    var formData = new FormData();
    formData.append('acao', 'excluirDestaque');
    formData.append('id', id);

    var senha = prompt("Digite A Sua Senha");
    resp = verificaSenha();
    if (resp == senha) {
        $.ajax({
            url: '/controller/controller.php',
            data: formData,
            type: 'post',

            processData: false,
            cache: false,
            contentType: false,

            success: function (data) {
                alert(data);
                location.reload();
            },
            error: function (data) {
                alert(data);
            }
        });
    } else {
        alert("Senha incorreta");
    }
}

$(document).ready(function () {
    $('#btnEnviarDestaque').on('click touchstart', function () {
        form = document.getElementById('formCadDestaque');
        var formData = new FormData();
        formData.append('acao', 'cadastrarDestaque');
        formData.append('imagem', $('#logo2').prop('files')[0]);

        var senha = prompt("Digite A Sua Senha");
        resp = verificaSenha();
        if (resp == senha) {
            $.ajax({
                url: '/controller/controller.php',
                data: formData,
                type: 'post',

                processData: false,
                cache: false,
                contentType: false,

                success: function (data) {
                    alert(data);
                },
                error: function (data) {
                    alert(data);
                }
            });
        } else {
            alert("Senha incorreta");
        }
    });
});

function detectar_mobile() {
    if (navigator.userAgent.match(/Android/i)
            || navigator.userAgent.match(/webOS/i)
            || navigator.userAgent.match(/iPhone/i)
            || navigator.userAgent.match(/iPad/i)
            || navigator.userAgent.match(/iPod/i)
            || navigator.userAgent.match(/BlackBerry/i)
            || navigator.userAgent.match(/Windows Phone/i)
            ) {
        return true;
    } else {
        return false;
    }
}

$(document).ready(function () {
    $('#btnExcluirLogo').on('click touchstart', function () {
        form = document.getElementById('excluirLogos');
        var formData = new FormData();

        formData.append('acao', 'excluirLogo');
        formData.append('empresa', form.logoSelecionada.value);

        var senha = prompt("Digite A Sua Senha");
        resp = verificaSenha();
        if (resp == senha) {
            if (confirm("Tem Certeza que Deseja Excluir Esta Logo ?")) {
                $.ajax({
                    url: '/controller/controller.php',
                    data: formData,
                    type: 'post',

                    processData: false,
                    cache: false,
                    contentType: false,

                    success: function (data) {
                        alert(data);
                        location.reload();
                    },
                    error: function (data) {
                        alert(data);
                        location.reload();
                    }
                });
            } else {
                alert('Cancelado com Sucesso');
            }
        } else {
            alert("Senha incorreta");
        }
    });
});


$(document).ready(function () {
    $('#btnEnviarLogo').on('click touchstart', function () {
        form = document.getElementById('formCadLogo');
        var formData = new FormData();

        formData.append('acao', 'cadastrarLogo');
        formData.append('empresa', form.empresaSelecionada.value);
        formData.append('imagemLogo', $('#logo2').prop('files')[0]);

        var senha = prompt("Digite A Sua Senha");
        resp = verificaSenha();
        if (resp == senha) {
            $.ajax({
                url: '/controller/controller.php',
                data: formData,
                type: 'post',

                processData: false,
                cache: false,
                contentType: false,

                success: function (data) {
                    alert(data);
                },
                error: function (data) {
                    alert(data);
                }
            });
        } else {
            alert("Senha incorreta");
        }
    })
});

$(document).ready(function () {
    $('#btnEnviarPropaganda').on('click touchstart', function () {
        var senha = prompt("Digite a sua senha");
        resp = verificaSenha();
        if (resp == senha) {
            alert("senha correta");
            form = document.getElementById('formCadPropaganda');
            var formData = new FormData();

            formData.append('acao', 'cadastrarPropaganda');
            formData.append('empresa', form.empresaSelecionada.value);
            formData.append('descricao', form.campoDescricao.value);
            formData.append('link', form.campoLink.value);
            formData.append('imagem', $('#logo2').prop('files')[0]);

            $.ajax({
                url: '/controller/controller.php',
                data: formData,
                type: 'post',

                processData: false,
                cache: false,
                contentType: false,

                success: function (data) {
                    alert(data);
                },
                error: function (data) {
                    alert(data);
                }
            })
        } else {
            alert("Senha incorreta");
        }
    })
});

function encaminharParaEmpresas(id) {
    window.location.href = '/paginaDaEmpresa.php?action=' + id + '&url_antiga=' + window.location.href;
}

function encaminharParaCategorias(id) {
    window.location.href = '/paginaDasCategorias.php?action=' + id;
}

$(document).ready(function () {
    $('#btnBuscar').on('click touchstart', function () {
        var formData = new FormData();
        if ($('#palavraChave').val() == "") {

        } else {
            window.location.href = '/resultadosDaPesquisa.php?action=' + $('#palavraChave').val();
        }
    })
});

$(document).ready(function () {
    $('#btnBuscarPtuCard').on('click touchstart', function () {
       var formData = new FormData();
        if ($('#palavraChavePtuCard').val() == "") {

        } else {
            window.location.href = '/resultadosDaPesquisaPtuCard.php?action=' + $('#palavraChavePtuCard').val();
        }
    })
});

$(document).ready(function () {
    $('#voltarParaListaDeCategorias2').on('click touchstart', function () {
        window.location.href = '/index.php';
    })
});

function btnVoltarLista2(url) {
    window.location.href = url;
}

function verificarCategoria(id) {
    var formData = new FormData();

    formData.append('acao', 'buscarEmpresasPorCategoria');
    formData.append('id', id);

    $.ajax({
        url: '/controller/controller.php',
        data: formData,
        type: 'post',

        processData: false,
        cache: false,
        contentType: false,

        success: function (data) {
            $("#lista").hide();
            $("#listaDeEmpresasEncontradas").show();
            if (data == "null") {
                $("#respostaDeListaDeEmpresasEncontradas").html("<b>Não Foram Encontradas Empresas Nesta Categoria!</b>");
            } else {
                $('#respostaComAsempresas').append(data);
            }
        },
        error: function (data) {
            alert(data);
        }
    });
}
function verificarEmpresa(id) {
    var formData = new FormData();

    formData.append('acao', 'buscarEmpresa');
    formData.append('id', id);

    $.ajax({
        url: '/controller/controller.php',
        data: formData,
        type: 'post',

        processData: false,
        cache: false,
        contentType: false,

        success: function (data) {
            $("#listaDeEmpresasEncontradas").hide();
            var resp = JSON.parse(data);
            $("#divEscondida_dois").show();
            $("#NomeDaEmpresa").append("<p style='font-size: 150%'>" + 'NOME : ' + resp.nome + "<b>&nbsp;</b></p>");
            $("#imagemDaempresa").append("<img src = " + resp.logo + " class='img-thumbnail img-responsive' alt='' width='300' height='100'> ");
            $("#enderecoDaEmpresa").append("<p style='font-size: 150%'>" + 'ENDEREÇO : ' + resp.rua + ' - ' + resp.numero + ' - ' + resp.bairro + "<b>&nbsp;</b></p>");
            $("#telefoneDaempresa").append("<p style='font-size: 150%'>" + 'TELEFONE : ' + resp.telefone + "<b>&nbsp;</b></p>");
            $("#celularDaempresa").append("<p style='font-size: 150%'>" + 'CELULAR : ' + resp.celular + "<b>&nbsp;</b></p>");
        },
        error: function (data) {
            alert(data);
        }
    });
}


$(document).ready(function () {
    $('#btnVoltarParaListaDeCategorias').on('click touchstart', function () {
        var delay = 500; //1 seconds
        setTimeout(function () {
            $("#NomeDaEmpresa").empty();
            $("#imagemDaempresa").empty();
            $("#enderecoDaEmpresa").empty();
            $("#telefoneDaempresa").empty();
            $("#celularDaempresa").empty();
            $("#divEscondida_dois").hide();
            $("#listaDeEmpresasEncontradas").show();
        }, delay);
    })
});

$(document).ready(function () {
    $('#btnVoltarPainel').on('click touchstart', function () {
        window.location.href = "/painel.php";
    })
});

$(document).ready(function () {
    $('#voltarParaListaDeCategorias').on('click touchstart', function () {
        var delay = 500; //1 seconds
        setTimeout(function () {
            $("#lista").show();
            $('#respostaComAsempresas').empty();
            $("#listaDeEmpresasEncontradas").hide();
        }, delay);
    })
});


$(document).ready(function () {
    $('#btnEnviarEmpresa').on('click touchstart', function () {
        form = document.getElementById('formCadempresa');
        var formData = new FormData();

        formData.append('acao', 'cadastrarEmpresa');
        formData.append('nome', form.campoNome.value);
        formData.append('endereco', form.campoEndereco.value);
        formData.append('telefone', form.campoTelefone.value);
        formData.append('celular', form.campoCelular.value);

        formData.append('campo_horario_abertura', form.campo_horario_abertura.value);
        formData.append('campo_horario_fechamento', form.campo_horario_fechamento.value);
        formData.append('paracatucard', form.paracatucard.value);

        formData.append('categoria_um', form.categoria_um.value);
        formData.append('categoria_dois', form.categoria_dois.value);
        formData.append('categoria_tres', form.categoria_tres.value);

        var senha = prompt("Digite A Sua Senha");
        resp = verificaSenha();
        if (resp == senha) {
            $.ajax({
                url: '/controller/controller.php',
                data: formData,
                type: 'post',

                processData: false,
                cache: false,
                contentType: false,

                success: function (data) {
                    alert(data);
                },
                error: function (data) {
                    alert(data);
                }
            });
        } else {
            alert("Senha incorreta");
        }
    })
});

$(document).ready(function () {
    $('#btnEnviarAutonomo').on('click touchstart', function () {
        form = document.getElementById('formCadempresa');
        var formData = new FormData();

        formData.append('acao', 'cadastrarAutonomo');
        formData.append('nome', form.campoNome.value);
        formData.append('endereco', form.campoEndereco.value);
        formData.append('telefone', form.campoTelefone.value);
        formData.append('celular', form.campoCelular.value);

        formData.append('campo_horario_abertura', form.campo_horario_abertura.value);
        formData.append('campo_horario_fechamento', form.campo_horario_fechamento.value);
        formData.append('paracatucard', form.paracatucard.value);

        formData.append('categoria_um', form.categoria_um.value);
        formData.append('categoria_dois', form.categoria_dois.value);
        formData.append('categoria_tres', form.categoria_tres.value);

        var senha = prompt("Digite A Sua Senha");
        resp = verificaSenha();
        if (resp == senha) {
            $.ajax({
                url: '/controller/controller.php',
                data: formData,
                type: 'post',

                processData: false,
                cache: false,
                contentType: false,

                success: function (data) {
                    alert(data);
                },
                error: function (data) {
                    alert(data);
                }
            });
        } else {
            alert("Senha incorreta");
        }
    })
});



function excluirEmpresa(id) {

    if (confirm("Tem Certeza que Deseja Excluir Esta Empresa ?")) {
        var formData = new FormData();
        formData.append('acao', 'excluirEmpresa');
        formData.append('id', id);

        var senha = prompt("Digite A Sua Senha");
        resp = verificaSenha();
        if (resp == senha) {
            $.ajax({
                url: '/controller/controller.php',
                data: formData,
                type: 'post',

                processData: false,
                cache: false,
                contentType: false,

                success: function (data) {
                    alert(data);
                    location.reload();
                },
                error: function (data) {
                    alert(data);
                    location.reload();
                }
            });
        } else {
            alert("Senha incorreta");
        }
    } else {
        alert('Cancelado com Sucesso');
    }
}

function excluirCategoria(id) {

    if (confirm("Tem Certeza que Deseja Excluir Esta Categoria ?")) {
        var formData = new FormData();
        formData.append('acao', 'excluirCategoria');
        formData.append('id', id);

        var senha = prompt("Digite A Sua Senha");
        resp = verificaSenha();
        if (resp == senha) {
            $.ajax({
                url: '/controller/controller.php',
                data: formData,
                type: 'post',

                processData: false,
                cache: false,
                contentType: false,

                success: function (data) {
                    alert(data);
                    location.reload();
                },
                error: function (data) {
                    alert(data);
                    location.reload();
                }
            });
        } else {
            alert("Senha incorreta");
        }
    } else {
        alert('Cancelado com Sucesso');
    }
}

function excluirCategoriaAutonomos(id) {

    if (confirm("Tem Certeza que Deseja Excluir Esta Categoria ?")) {
        var formData = new FormData();
        formData.append('acao', 'excluirCategoriaAutonomos');
        formData.append('id', id);

        var senha = prompt("Digite A Sua Senha");
        resp = verificaSenha();
        if (resp == senha) {
            $.ajax({
                url: '/controller/controller.php',
                data: formData,
                type: 'post',

                processData: false,
                cache: false,
                contentType: false,

                success: function (data) {
                    alert(data);
                    location.reload();
                },
                error: function (data) {
                    alert(data);
                    location.reload();
                }
            });
        } else {
            alert("Senha incorreta");
        }
    } else {
        alert('Cancelado com Sucesso');
    }
}

function alterarEmpresa(id) {
    window.location.href = '/AlterarCadastro.php?action=' + id;
}

function alterarCategoria(id) {
    var novoNome = prompt("DIGITE O NOVO NOME :");

    if (novoNome != null)
    {
        var formData = new FormData();

        formData.append('acao', 'alterarCategoria');
        formData.append('novoNome', novoNome);
        formData.append('id', id);

        var senha = prompt("Digite A Sua Senha");
        resp = verificaSenha();
        if (resp == senha) {
            $.ajax({
                url: '/controller/controller.php',
                data: formData,
                type: 'post',

                processData: false,
                cache: false,
                contentType: false,

                success: function (data) {
                    alert(data);
                    location.reload();

                },
                error: function (data) {
                    alert(data);
                    location.reload();
                }
            });
        } else {
            alert("Senha incorreta");
        }
    } else {
        alert("Cancelado");
    }
}

function alterarCategoriaAutonomos(id) {
    var novoNome = prompt("DIGITE O NOVO NOME :");

    if (novoNome != null)
    {
        var formData = new FormData();

        formData.append('acao', 'alterarCategoriaAutonomos');
        formData.append('novoNome', novoNome);
        formData.append('id', id);

        var senha = prompt("Digite A Sua Senha");
        resp = verificaSenha();
        if (resp == senha) {
            $.ajax({
                url: '/controller/controller.php',
                data: formData,
                type: 'post',

                processData: false,
                cache: false,
                contentType: false,

                success: function (data) {
                    alert(data);
                    location.reload();

                },
                error: function (data) {
                    alert(data);
                    location.reload();
                }
            });
        } else {
            alert("Senha incorreta");
        }
    } else {
        alert("Cancelado");
    }
}

$(document).ready(function () {
    $('#btnEditarEmpresa').on('click touchstart', function () {
        var id = window.location.href;
        form = document.getElementById('formEditarEmpresa');
        var formData = new FormData();

        formData.append('acao', 'editarEmpresa');
        formData.append('nome', form.campoNome.value);
        formData.append('endereco', form.campoEndereco.value);
        formData.append('telefone', form.campoTelefone.value);
        formData.append('celular', form.campoCelular.value);
        formData.append('campo_horario_abertura', form.campo_horario_abertura.value);
        formData.append('campo_horario_fechamento', form.campo_horario_fechamento.value);
        formData.append('paracatucard', form.paracatucard.value);
        formData.append('categoria_um', form.categoria_um.value);
        formData.append('categoria_dois', form.categoria_dois.value);
        formData.append('categoria_tres', form.categoria_tres.value);
        formData.append('id', id);

        var senha = prompt("Digite A Sua Senha");
        resp = verificaSenha();
        if (resp == senha) {
            $.ajax({
                url: '/controller/controller.php',
                data: formData,
                type: 'post',

                processData: false,
                cache: false,
                contentType: false,

                success: function (data) {
                    alert(data);
                    location.reload();
                },
                error: function (data) {
                    alert(data);
                    location.reload();
                }
            });
        } else {
            alert("Senha incorreta");
        }
    })
});

$(document).ready(function () {
    $('#adicionarCat').on('click touchstart', function () {

        form = document.getElementById('formAddCat');
        var formData = new FormData();

        formData.append('acao', 'adicionarCat');
        formData.append('nome', form.campoNomeCat.value);

        var senha = prompt("Digite A Sua Senha");
        resp = verificaSenha();
        if (resp == senha) {
            $.ajax({
                url: '/controller/controller.php',
                data: formData,
                type: 'post',

                processData: false,
                cache: false,
                contentType: false,

                success: function (data) {
                    alert(data);
                },
                error: function (data) {
                    alert(data);
                }
            });

        } else {
            alert("Senha incorreta");
        }
    })
});

$(document).ready(function () {
    $('#adicionarCatAutonomos').on('click touchstart', function () {

        form = document.getElementById('formAddCatAutonomos');
        var formData = new FormData();

        formData.append('acao', 'adicionarCatAutonomos');
        formData.append('nome', form.campoNomeCatAutonomos.value);

        var senha = prompt("Digite A Sua Senha");
        resp = verificaSenha();
        if (resp == senha) {
            $.ajax({
                url: '/controller/controller.php',
                data: formData,
                type: 'post',

                processData: false,
                cache: false,
                contentType: false,

                success: function (data) {
                    alert(data);
                },
                error: function (data) {
                    alert(data);
                }
            });

        } else {
            alert("Senha incorreta");
        }
    })
});

function verificaSenha() {
    var resp;
    var formData = new FormData();
    formData.append('acao', 'buscarSenha');

    $.ajax({
        url: '/controller/controller.php',
        data: formData,
        type: 'post',

        processData: false,
        cache: false,
        contentType: false,
        async: false,

        success: function (data) {
            resp = data;
        },
        error: function (data) {
            alert(data);
        }
    });

    return resp;
}


$(document).ready(function () {
    $('#btnEnviarNovaSenha').on('click touchstart', function () {

        form = document.getElementById('formCadSenhaPainel');
        var formData = new FormData();

        formData.append('acao', 'cadastrarSenhaPainel');
        formData.append('senha', form.campoNovaSenha.value);
        formData.append('senha_dois', form.campoNovaSenha_dois.value);

        $.ajax({
            url: '/controller/controller.php',
            data: formData,
            type: 'post',

            processData: false,
            cache: false,
            contentType: false,

            success: function (data) {
                alert(data);
            },
            error: function (data) {
                alert(data);
            }
        });
    })
});
