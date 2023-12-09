function truncateWithTooltip(string, length = 20) {
  // Check for null or undefined
  if (string === null || string === undefined) {
    return "";
  }

  // Convert null or undefined values to empty string
  string = String(string);

  // Trim leading and trailing whitespace
  string = string.trim();

  // Check if the trimmed string is empty
  if (string === "") {
    return "";
  }

  var truncated = (string.length > length) ? string.substring(0, length) + "..." : string;
  var tooltip = string.replace(/"/g, '&quot;');
  var output = '<span class="custom-tooltip" data-bs-toggle="tooltip" data-bs-custom-class="tooltip-inverse" data-bs-placement="top" title="' + tooltip + '">' + truncated + '</span>';
  return output;
}


function showActionToaster(message, status) {
  toastr.options = {
    closeButton: false,
    debug: false,
    newestOnTop: false,
    progressBar: false,
    positionClass: "toastr-bottom-right",
    preventDuplicates: false,
    onclick: null,
    showDuration: "300",
    hideDuration: "1000",
    timeOut: "5000",
    extendedTimeOut: "1000",
    showEasing: "swing",
    hideEasing: "linear",
    showMethod: "fadeIn",
    hideMethod: "fadeOut",
  };
  toastr.success(message, status);
}

function formatNullableDate(date) {
  if (date !== null && date !== '0000-00-00') {
    var formattedDate = new Date(date);
    if (!isNaN(formattedDate)) {
      var day = formattedDate.getDate();
      var month = formattedDate.getMonth() + 1;
      var year = formattedDate.getFullYear();
      return (day < 10 ? '0' + day : day) + '/' + (month < 10 ? '0' + month : month) + '/' + year;
    }
  }
  return '';
}


function formatDateAndShowExpiryColor(date) {

  if (date !== null && date !== '0000-00-00') {
    var formattedDate = new Date(date);
    if (!isNaN(formattedDate)) {
      var currentDate = new Date();
      var day = formattedDate.getDate();
      var month = formattedDate.getMonth() + 1;
      var year = formattedDate.getFullYear();

      if (formattedDate < currentDate) {
        var daysExpired = Math.floor((currentDate - formattedDate) / (1000 * 60 * 60 * 24));
        return '<span class="custom-tooltip" data-toggle="tooltip" data-custom-class="tooltip-inverse" data-placement="top" style="color: red;" title="Expired ' + daysExpired + ' days ago">' + (day < 10 ? '0' + day : day) + '/' + (month < 10 ? '0' + month : month) + '/' + year + '</span>';
      }

      var upcomingDate = new Date();
      upcomingDate.setMonth(upcomingDate.getMonth() + 1);
      if (formattedDate < upcomingDate) {
        var daysRemaining = Math.ceil((formattedDate - currentDate) / (1000 * 60 * 60 * 24));
        return '<span class="custom-tooltip" data-toggle="tooltip" data-custom-class="tooltip-inverse" data-placement="top" style="color: #ff8f02;" title="Expires in ' + daysRemaining + ' days">' + (day < 10 ? '0' + day : day) + '/' + (month < 10 ? '0' + month : month) + '/' + year + '</span>';
      }

      return (day < 10 ? '0' + day : day) + '/' + (month < 10 ? '0' + month : month) + '/' + year;
    }
  }

  return '';
}
function formatDate(date) {

  if (date !== null && date !== '0000-00-00') {
    var formattedDate = new Date(date);
    if (!isNaN(formattedDate)) {
      var currentDate = new Date();
      var day = formattedDate.getDate();
      var month = formattedDate.getMonth() + 1;
      var year = formattedDate.getFullYear();


      return (day < 10 ? '0' + day : day) + '/' + (month < 10 ? '0' + month : month) + '/' + year;
    }
  }

  return '';
}

function formatEid(input) {
  let value = input.val().replace(/\D/g, '');
  let formattedValue = '';

  for (let i = 0; i < value.length; i++) {
    if (i === 3 || i === 7 || i === 14) {
      formattedValue += '-';
    }
    formattedValue += value[i];
  }

  formattedValue = formattedValue.substring(0, 18); // Limit to a maximum of 18 characters

  input.val(formattedValue);
}

function checkImageExists(url) {
  return fetch(url)
    .then(response => response.ok)
    .catch(() => false);
}

function show_image(path, imageName, imageClass = '') {
  var imagePath = path + imageName;
  var fallbackImagePath = 'assets/media/logos/nophoto.png';

  return checkImageExists(imagePath)
    .then(exists => {
      var imageUrl = exists ? imagePath : fallbackImagePath;
      var imageClassAttribute = imageClass ? `class="${imageClass}"` : '';
      return `<img src="${imageUrl}" ${imageClassAttribute} alt="Image">`;
    });
}