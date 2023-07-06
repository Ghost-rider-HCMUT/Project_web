$("button.destroy").click(function (e) {
  e.preventDefault();
  var dataUrl = $(this).attr("data-href");
  $("#exampleModal a").attr("href", dataUrl);
});
$(".form-student-create,.form-student-edit").validate({
  rules: {
    // simple rule, converted to {required:true}
    name: {
      required: true,
      maxlength: 50,
      regex:
        /^[a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+$/i,
    },

    birthday: {
      required: true,
    },
    gender: {
      required: true,
    },
  },
  messages: {
    name: {
      required: "Vui lòng nhập họ và tên",
      maxlength: "Vui lòng không nhập quá 50 ký tự",
      regex: "Vui lòng nhập đúng định dạng họ và tên",
    },
    birthday: {
      required: "Vui lòng nhập ngày sinh",
    },

    gender: {
      required: "Vui lòng chọn giới tính",
    },
  },
});

$(".form-subject-create,.form-subject-edit").validate({
  rules: {
    // simple rule, converted to {required:true}
    name: {
      required: true,
    },

    number_of_credit: {
      required: true,
      regex: /^[0-9]+$/,
      range: [1, 10],
    },
  },
  messages: {
    name: {
      required: "Vui lòng nhập tên môn học",
    },
    number_of_credit: {
      required: "Vui lòng nhập số tín chỉ",
      regex: "Vui lòng nhập con số nguyên",
      range: "Vui lòng nhập con số từ 1 đến 10",
    },
  },
});

$(".form-register-create").validate({
  rules: {
    // simple rule, converted to {required:true}
    student_id: {
      required: true,
    },

    subject_id: {
      required: true,
    },
  },
  messages: {
    student_id: {
      required: "Vui lòng chọn sinh viên",
    },
    subject_id: {
      required: "Vui lòng chọn môn học",
    },
  },
});
$(".form-register-edit").validate({
  rules: {
    // simple rule, converted to {required:true}
    score: {
      range: [0, 10],
    },
  },
  messages: {
    score: {
      range: "Vui lòng nhập điểm từ 0 đến 10",
    },
  },
});

$.validator.addMethod(
  "regex",
  function (value, element, regexp) {
    var re = new RegExp(regexp);
    return this.optional(element) || re.test(value);
  },
  "Please check your input."
);
