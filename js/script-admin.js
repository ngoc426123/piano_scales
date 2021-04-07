window.$ = jQuery;

$(document).ready(() => {
  const $html = $('html');
  const $piano = $('.piano');
  const $btnAddMenu = $('.btn-click-add-piano');
  const $pianoGrid = $('.piano-grid');
  const $inputPiano = 'input';
  const clsHold = 'hold';
  const clsActive = 'active';
  const tmpPiano = `<div class="piano-col">
                      <div class="piano-box">
                        <div class="piano-box-head">
                          <button type="button" class="piano-del">X</button>
                        </div>
                        <div class="piano">
                          <svg data-name='piano' xmlns="http://www.w3.org/2000/svg" viewBox='0 0 491 175'> <g class="group-note"> <path class="white" id="1" d="M 0 8 L 0 175 L 36 175 L 36 8 L 0 8 Z" data-index="1" data-note='F'/> <path class="white" d="M 36 8 L 36 175 L 71 175 L 71 8 L 71 8 Z" data-index="3" data-note='G'/> <path class="white" d="M 71 8 L 71 175 L 106 175 L 106 8 L 106 8 Z" data-index="5" data-note='A'/> <path class="white" d="M 106 8 L 106 175 L 141 175 L 141 8 L 106 8 Z" data-index="7" data-note='B'/> <path class="white" d="M 141 8 L 141 175 L 176 175 L 176 8 L 141 8 Z" data-index="8" data-note='C'/> <path class="white" d="M 176 8 L 176 175 L 211 175 L 211 8 L 176 8 Z" data-index="10" data-note='D'/> <path class="white" d="M 211 8 L 211 175 L 246 175 L 246 8 L 211 8 Z" data-index="12" data-note='E'/> <path class="white" d="M 246 8 L 246 175 L 281 175 L 281 8 L 246 8 Z" data-index="13" data-note='F'/> <path class="white" d="M 281 8 L 281 175 L 316 175 L 316 8 L 281 8 Z" data-index="15" data-note='G'/> <path class="white" d="M 316 8 L 316 175 L 351 175 L 351 8 L 316 8 Z" data-index="17" data-note='A'/> <path class="white" d="M 351 8 L 351 175 L 386 175 L 386 8 L 351 8 Z" data-index="19" data-note='B'/> <path class="white" d="M 386 8 L 386 175 L 421 175 L 421 8 L 386 8 Z" data-index="20" data-note='C'/> <path class="white" d="M 421 8 L 421 175 L 456 175 L 456 8 L 421 8 Z" data-index="22" data-note='D'/> <path class="white" d="M 456 8 L 456 175 L 491 175 L 491 8 L 456 8 Z" data-index="24" data-note='E'/> <path class="black" d="M 22 8 L 22 110 L 50 110 L 50 8 L 22 8 Z" data-index="2" data-note='F#|Gb' data-idx='-1'/> <path class="black" d="M 57 8 L 57 110 L 85 110 L 85 8 L 57 8 Z" data-index="4" data-note='G#|Ab' data-idx='-1'/> <path class="black" d="M 92 8 L 92 110 L 120 110 L 120 8 L 92 8 Z" data-index="6" data-note='A#|Bb' data-idx='-1'/> <path class="black" d="M 162 8 L 162 110 L 190 110 L 190 8 L 162 8 Z" data-index="9" data-note='C#|Db' data-idx='-1'/> <path class="black" d="M 197 8 L 197 110 L 225 110 L 225 8 L 197 8 Z" data-index="11" data-note='D#|Eb' data-idx='-1'/> <path class="black" d="M 267 8 L 267 110 L 295 110 L 295 8 L 267 8 Z" data-index="14" data-note='F#|Gb' data-idx='-1'/> <path class="black" d="M 302 8 L 302 110 L 330 110 L 330 8 L 302 8 Z" data-index="16" data-note='G#|Ab' data-idx='-1'/> <path class="black" d="M 337 8 L 337 110 L 365 110 L 365 8 L 337 8 Z" data-index="18" data-note='A#|Bb' data-idx='-1'/> <path class="black" d="M 407 8 L 407 110 L 435 110 L 435 8 L 407 8 Z" data-index="21" data-note='C#|Db' data-idx='-1'/> <path class="black" d="M 442 8 L 442 110 L 470 110 L 470 8 L 442 8 Z" data-index="23" data-note='D#|Eb' data-idx='-1'/> </g><g class="group-text"> <g class='text-note-white' data-index='1'> <circle cx='18' cy='157' r='15'/> <text x='18' y='157' dy='.3em' text-anchor="middle"></text> </g> <g class='text-note-black' data-index='2'> <circle cx='36' cy='94' r='12'/> <text x='36' y='94' dy='.3em' text-anchor="middle"></text> </g> <g class='text-note-white' data-index='3'> <circle cx='53' cy='157' r='15'/> <text x='53' y='157' dy='.3em' text-anchor="middle"></text> </g> <g class='text-note-black' data-index='4'> <circle cx='71' cy='94' r='12'/> <text x='71' y='94' dy='.3em' text-anchor="middle"></text> </g> <g class='text-note-white' data-index='5'> <circle cx='88' cy='157' r='15'/> <text x='88' y='157' dy='.3em' text-anchor="middle"></text> </g> <g class='text-note-black' data-index='6'> <circle cx='106' cy='94' r='12'/> <text x='106' y='94' dy='.3em' text-anchor="middle"></text> </g> <g class='text-note-white' data-index='7'> <circle cx='123' cy='157' r='15'/> <text x='123' y='157' dy='.3em' text-anchor="middle"></text> </g> <g class='text-note-white' data-index='8'> <circle cx='158' cy='157' r='15'/> <text x='158' y='157' dy='.3em' text-anchor="middle"></text> </g> <g class='text-note-black' data-index='9'> <circle cx='176' cy='94' r='12'/> <text x='176' y='94' dy='.3em' text-anchor="middle"></text> </g> <g class='text-note-white' data-index='10'> <circle cx='193' cy='157' r='15'/> <text x='193' y='157' dy='.3em' text-anchor="middle"></text> </g> <g class='text-note-black' data-index='11'> <circle cx='211' cy='94' r='12'/> <text x='211' y='94' dy='.3em' text-anchor="middle"></text> </g> <g class='text-note-white' data-index='12'> <circle cx='228' cy='157' r='15'/> <text x='228' y='157' dy='.3em' text-anchor="middle"></text> </g> <g class='text-note-white' data-index='13'> <circle cx='263' cy='157' r='15'/> <text x='263' y='157' dy='.3em' text-anchor="middle"></text> </g> <g class='text-note-black' data-index='14'> <circle cx='281' cy='94' r='12'/> <text x='281' y='94' dy='.3em' text-anchor="middle"></text> </g> <g class='text-note-white' data-index='15'> <circle cx='298' cy='157' r='15'/> <text x='298' y='157' dy='.3em' text-anchor="middle"></text> </g> <g class='text-note-black' data-index='16'> <circle cx='316' cy='94' r='12'/> <text x='316' y='94' dy='.3em' text-anchor="middle"></text> </g> <g class='text-note-white' data-index='17'> <circle cx='333' cy='157' r='15'/> <text x='333' y='157' dy='.3em' text-anchor="middle"></text> </g> <g class='text-note-black' data-index='18'> <circle cx='351' cy='94' r='12'/> <text x='351' y='94' dy='.3em' text-anchor="middle"></text> </g> <g class='text-note-white' data-index='19'> <circle cx='368' cy='157' r='15'/> <text x='368' y='157' dy='.3em' text-anchor="middle"></text> </g> <g class='text-note-white' data-index='20'> <circle cx='403' cy='157' r='15'/> <text x='403' y='157' dy='.3em' text-anchor="middle"></text> </g> <g class='text-note-black' data-index='21'> <circle cx='421' cy='94' r='12'/> <text x='421' y='94' dy='.3em' text-anchor="middle"></text> </g> <g class='text-note-white' data-index='22'> <circle cx='438' cy='157' r='15'/> <text x='438' y='157' dy='.3em' text-anchor="middle"></text> </g> <g class='text-note-black' data-index='23'> <circle cx='456' cy='94' r='12'/> <text x='456' y='94' dy='.3em' text-anchor="middle"></text> </g> <g class='text-note-white' data-index='24'> <circle cx='473' cy='157' r='15'/> <text x='473' y='157' dy='.3em' text-anchor="middle"></text> </g> </g> <path class="line-top" d="M 0 0 L 510 0 L 510 8 L 0 8 L 0 0 Z"/> </svg>
                          <input type="hidden" readonly name="piano_another_note[]">
                        </div>
                      </div>
                    </div>`;

  $html.off('click', '.piano .white').on('click', '.piano .white', (event) => {
    const $target = $(event.target);
    const piano = $($target).parents('.piano');
    const isHold = $target.hasClass(clsHold);
    const index = $target.attr('data-index');
    const text = $target.attr('data-note');

    if ( !isHold ) {
      set_piano(piano, index, true);
      set_text(piano, index, text, true);
    } else {
      set_piano(piano, index, false);
      set_text(piano, index, text, false);
    }

    render_data(piano);
  });

  $html.off('click', '.piano .black').on('click', '.piano .black', (event) => {
    const $target = $(event.target);
    const piano = $($target).parents('.piano');
    const index = $target.attr('data-index');
    const arrayText = $target.attr('data-note').split('|');
    let idx = $target.attr('data-idx');

    if ( idx >= 1 ) {
      idx = -1;
      $target.removeClass(clsHold);
      set_text(piano, index, arrayText[idx], false);
    } else {
      idx++;
      $target.addClass(clsHold);
      set_text(piano, index, arrayText[idx], true);
    }

    $target.attr('data-idx', idx);
    render_data(piano);
  });

  $btnAddMenu.off('click').on('click', () => {
    $pianoGrid.append($(tmpPiano));
  });

  $html.off('click', '.piano .piano-del').on('click', '.piano-box .piano-del', (event) => {
    const $target = $(event.target);
    const piano = $($target).parents('.piano-box');
    const pianoCol = $(piano).parents('.piano-col');

    pianoCol.remove();
  });

  function set_piano (piano, index, isActive) {
    isActive && piano.find('.group-note').find(`[data-index="${index}"]`).addClass(clsHold);
    !isActive && piano.find('.group-note').find(`[data-index="${index}"]`).removeClass(clsHold);
  }

  function set_text (piano, index, text, isShow) {
    const $text = piano.find('.group-text').find(`[data-index=${index}]`);

    if ( isShow ) {
      $text.addClass(clsActive);
      $text.attr('data-note', text).find('text').text(text);
    } else {
      $text.removeClass(clsActive);
      $text.attr('data-note', '').find('text').text('');
    }
  }

  function render_data (piano) {
    let data = [];
    const $hold_piano = piano.find('svg').find('.white.hold, .black.hold');
    const $input_piano = piano.find($inputPiano);

    $hold_piano.each((_idx, item) => {
      const index = $(item).data('index');
      const idx = $(item).attr('data-idx');
      let note = '';

      if ( idx ) {
        const arr_note =  $(item).attr('data-note').split('|');
        note = arr_note[idx];
      } else {
        note = $(item).data('note');
      }
      const _data = {index, note};

      data.push(_data);
    });

    $input_piano.val(JSON.stringify(data));
  }

  function init_piano (piano) {
    if ( !piano.find($inputPiano).val() ) {
      return;
    }

    const data = JSON.parse(piano.find($inputPiano).val());

    data.forEach(item => {
      const { note, index } = item;
      const _note = piano.find('.group-note').find(`[data-index='${index}']`);
      const _text = piano.find('.group-text').find(`[data-index='${index}']`);
      const arrayText = _note.attr('data-note').split('|');
      const id = arrayText.indexOf(note);

      _note.attr('data-idx', id).addClass(clsHold);
      _text.addClass(clsActive).find('text').text(note);
    });
  }

  $piano.each((index, item) => {
    const piano = $(item);
    init_piano(piano);
  });
});