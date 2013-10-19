function changeButton(btn)
{
    if (!btn.style)
    {
        alert("Sorry, your browser doesn't support this operation.");
        return;
    }
    btn.style.backgroundColor = "grey";
    btn.style.color = "black";
    return;
}
function altchangeButton(btn)
{
    if (!btn.style)
    {
        alert("Sorry, your browser doesn't support this operation.");
        return;
    }
    btn.style.backgroundColor = "#f2efec";
    btn.style.color = "black";
    return;
}