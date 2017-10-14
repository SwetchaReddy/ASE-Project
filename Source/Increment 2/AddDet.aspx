<%@ Page Language="C#" AutoEventWireup="true" MasterPageFile="~/MasterPage2.master" CodeFile="AddDet.aspx.cs" Inherits="AddDet_" %>
<asp:Content ContentPlaceHolderID="ContentPlaceHolder1" runat="server">
    <br />
<asp:Label ID="Label7" runat="server" Font-Bold="True" Font-Size="21px" 
    ForeColor="#0099FF" Text="Add Income" Font-Underline="True"></asp:Label>
    <br />
<table>

<tr>
<td>
    <br />
    <asp:Label ID="Label6" runat="server" Text="Transaction Id" Font-Bold="True"></asp:Label>
&nbsp;&nbsp;&nbsp;&nbsp;
</td>
<td>
    <br />
    <asp:TextBox ID="TextBox3" runat="server" ReadOnly="True" BackColor="#333333" 
        ForeColor="White" ></asp:TextBox>
</td>
</tr>

<tr>
<td>
    <br />
    <asp:Label ID="Label1" runat="server" Text="UID" Font-Bold="True"></asp:Label>
&nbsp;&nbsp;&nbsp;&nbsp;
</td>
<td>
    <br />
    <asp:TextBox ID="TextBox1" runat="server" ReadOnly="True" BackColor="#333333" 
        ForeColor="White"></asp:TextBox>
</td>
</tr>

<tr>
<td>
    <br />
    <asp:Label ID="Label2" runat="server" Text="Amount" Font-Bold="True"></asp:Label>
    <br />
&nbsp;&nbsp;&nbsp;&nbsp;
</td>
<td>
    <br />
    <asp:TextBox ID="TextBox2" Required="" runat="server" style="margin-right: 2px"></asp:TextBox>
    <br />
    <asp:RegularExpressionValidator ID="RegularExpressionValidator1" runat="server" 
        ControlToValidate="TextBox2" ErrorMessage="Amount is not valid!!!" 
        ForeColor="Red" ValidationExpression="^[0-9]*$"></asp:RegularExpressionValidator>
</td>
</tr>

<tr>
<td>
    <br />
    <asp:Label ID="Label3" runat="server" Text="Source" Font-Bold="True"></asp:Label>
&nbsp;&nbsp;&nbsp;&nbsp;
</td>
<td>
    <br />
    <asp:TextBox ID="TextBox4" Required="" runat="server" ontextchanged="TextBox4_TextChanged"></asp:TextBox>
</td>
</tr>



<tr>
<td>
    &nbsp;</td>
<td>
    &nbsp;</td>
</tr>



<tr>
<td>
    <asp:Label ID="Label8" runat="server" Text="Date" Font-Bold="True"></asp:Label>
</td>
<td>
    <asp:TextBox ID="TextBox5" Required="" Type="Date" runat="server"></asp:TextBox>
</td>
</tr>



<tr><td colspan="2" align="center">
    <br />
    <asp:Button ID="Button1" runat="server" Text="Submit" onclick="Button1_Click" 
        Font-Bold="True" ForeColor="#0099CC" CssClass="intabular" Height="34px" 
        Width="81px" /></td></tr>
</table>
    <br />
</asp:Content>
