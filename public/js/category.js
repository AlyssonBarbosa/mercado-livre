$(document).ready(function () {

  function getColor(level) {
    const colors = [
      'transparent',
      '#a7c9f9',
      '#aaacaf',
      '#848689'
    ];

    return colors[level - 2]
  }

  $('#select-site').change(function (e) {
    let val = $(this).val()

    window.location.href = `/categorias?site_id=${val}`;
  })

  $('#refresh').on('click', function (e) {
    location.reload(true);
  })

  $('#tree').on('click', '.observe-item', function (e) {
    const id = $(this).data('id')
    const loaded = $(this).data('loaded')
    const level = $(this).data('level') + 1


    $('.state-icon', this)
      .toggleClass('fa fa-angle-down fa-fw')
      .toggleClass('fa fa-angle-right fa-fw');


    if (!$(this).hasClass('collapsed') && !loaded) {

      $(this).data('loaded', true)

      $.ajax({
        type: "get",
        url: `/api/categorias/${id}`,
        success: function (response) {
          const group = $(`#tree-item-${id}`)
          let componentes = [];

          for (const category of response) {
            let icon = category.categories.length > 0 ? '<i class="state-icon fa fa-angle-right fa-fw"></i>' : ''
            let component = `<div data-loaded="false" data-level="${level}" data-id="${category.id}" role="treeitem" style="padding-left:${level * 1.25}rem; background-color: ${getColor(level)} !important"
            class="list-group-item observe-item" arial-level="${level}" data-bs-toggle="collapse" data-bs-target="#tree-item-${category.id}" >
            ${icon} ${category.name} <span class="badge bg-success">${category.categories.length}</span>
        </div >
        <div role="group" id="tree-item-${category.id}" class="list-group collapse"></div>`;
            componentes.push(component)

          }

          $(group).append(componentes)
        }
      });
    }
  })
});