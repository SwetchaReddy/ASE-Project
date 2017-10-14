<%@ Page Language="C#" AutoEventWireup="true" MasterPageFile="~/MasterPage.master" CodeFile="Login.aspx.cs" Inherits="Login" %>
<asp:Content ContentPlaceHolderID="ContentPlaceHolder1" runat="server">
    <div>
    <table class="intabular">
    <tr>
    <td colspan="2" align="center">
    <h2 style="color: #0099CC; text-decoration: underline;">Login</h2>
    </td>
    </tr>

    <tr>
    <td>
        <br />
        User Id<br />
        </td>
    <td class="style1">
        <br />
        <asp:TextBox ID="txtusername" runat="server" Height="18px" Width="170px" 
            ontextchanged="txtusername_TextChanged"></asp:TextBox>
        <br />
        </td>
    </tr>

    <tr>
    <td>Password<br />
        <br />
        </td>
    <td class="style1">
        <asp:TextBox ID="txtpassword" runat="server" TextMode="Password" Height="17px" 
            Width="170px"></asp:TextBox>
        <br />
        <br />
        </td>
    </tr>

    <tr>
    <td colspan="2" align="center">
        <asp:Button ID="Button2" runat="server" Text="Login" onclick="Button2_Click" 
            CssClass="intabular" Height="40px" Width="110px" Font-Bold="True" 
            ForeColor="#0099CC" />
        <br />
        <br />
        <br />
        </td>
    </tr>

    <tr>
    <td colspan="2" class="style1">Not a member yet!!!&nbsp; 
        <asp:LinkButton ID="LinkButton1" runat="server" onclick="LinkButton1_Click" 
            Font-Bold="True" Font-Strikeout="False" Font-Underline="True" 
            ForeColor="#0099CC">Click Here</asp:LinkButton>
        <br />
        </td>
    </tr>
    </table></div>
    <br />
</asp:Content>
<asp:Content ID="Content1" runat="server" contentplaceholderid="head">
    <style type="text/css">
        .style1
        {
            height: 23px;
        }
    </style>
</asp:Content>

