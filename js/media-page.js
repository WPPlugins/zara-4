jQuery(document).ready(function($) {
  if (adminpage === "upload-php") {

    new $.fn.Zara4_MediaPage_BulkCompression();
    new $.fn.Zara4_MediaPage_CompressAll();
    new $.fn.Zara4_MediaPage_CompressionInfoModal();
    new $.fn.Zara4_MediaPage_MediaColumn();
    new $.fn.Zara4_MediaPage_OutOfQuotaModal();
    new $.fn.Zara4_MediaPage_AttachmentModal();

  }
});