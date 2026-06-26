function pageCall(path) {
    const refer = window.location.href;
    window.location.href=path+"?r="+refer+"&i="+path;
}