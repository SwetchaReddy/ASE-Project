<%@ Page Language="C#" AutoEventWireup="true" MasterPageFile="~/MasterPage2.master" CodeFile="ViewBaln.aspx.cs" Inherits="ViewBaln" %>
<asp:Content ContentPlaceHolderID="ContentPlaceHolder1" runat="server">
    <br />
    <asp:Label ID="Label1" runat="server" Font-Bold="True" Font-Size="21px"
        ForeColor="#0099CC" Text="View Balance" Font-Underline="True"></asp:Label>
    <br />
    <asp:Label ID="LabelUid" runat="server" Visible="False"></asp:Label>
    <br />
    <br />
    Search By<br />
    Month&nbsp;
    <asp:DropDownList ID="DropDownList2" runat="server">
        <asp:ListItem>--Select--</asp:ListItem>
        <asp:ListItem Value="01">01</asp:ListItem>
        <asp:ListItem Value="02">02</asp:ListItem>
        <asp:ListItem Value="03">03</asp:ListItem>
        <asp:ListItem Value="04">04</asp:ListItem>
        <asp:ListItem Value="05">05</asp:ListItem>
        <asp:ListItem Value="06">06</asp:ListItem>
        <asp:ListItem Value="07">07</asp:ListItem>
        <asp:ListItem Value="08">08</asp:ListItem>
        <asp:ListItem Value="09">09</asp:ListItem>
        <asp:ListItem Value="10">10</asp:ListItem>
        <asp:ListItem Value="11">11</asp:ListItem>
        <asp:ListItem Value="12">12</asp:ListItem>
    </asp:DropDownList>
    <br />
    <br />
    Year&nbsp;&nbsp;
    <asp:TextBox ID="TextBox7" runat="server"></asp:TextBox>
    <br />
    <br />
    <asp:Button ID="Button4" runat="server" CssClass="intabular" 
        onclick="Button1_Click" Text="Search" />
    <br />
    <br />
    <br />
    <asp:Panel ID="Panel3" runat="server" Visible="false">
   
    <table>
    <tr><td>
        <asp:Label ID="Label2" runat="server" Text="Total Income"></asp:Label>
        <br />
        <br />
    </td>
    <td>
        <asp:TextBox ID="TextBox1" runat="server" ReadOnly="True" BackColor="#333333" 
            ForeColor="White"></asp:TextBox>
        <br />
        <br />
    </td>
    </tr>

    <tr><td>
        <asp:Label ID="Label3" runat="server" Text="Total Expense"></asp:Label>
        <br />
        <br />
    </td>
    <td>
        <asp:TextBox ID="TextBox2" runat="server" ReadOnly="True" BackColor="#333333" 
            ForeColor="White"></asp:TextBox>
        <br />
        <br />
    </td>
    </tr>

    <tr><td>
        <asp:Label ID="Label4" runat="server" Text="Savings"></asp:Label>
        <br />
        <br />
    </td>
    <td>
        <asp:TextBox ID="TextBox3" runat="server" ReadOnly="True" BackColor="#333333" 
            ForeColor="White"></asp:TextBox>
        <br />
        <br />
    </td>
    </tr>

     <tr><td>
        <asp:Label ID="Label5" runat="server" Text="Date"></asp:Label>
        <br />
        <br />
    </td>
    <td>
        <asp:TextBox ID="TextBox5" runat="server" BackColor="#333333" 
            Font-Names="Britannic Bold" ForeColor="White" ReadOnly="True"></asp:TextBox>
        <br />
        <br />
    </td>
    </tr>

    <tr><td colspan="2">
        <asp:Panel ID="Panel1" runat="server" Visible="false">
        <table><tr><td>
            <asp:Label ID="Label7" runat="server" Text="Expense Limit"></asp:Label>
        </td>
        <td>
            <asp:TextBox ID="TextBox4" runat="server"></asp:TextBox>&nbsp;
            <asp:Button ID="Button2"
                runat="server" Text="Update" onclick="Button2_Click" />
        </td>
        </tr></table>
         </asp:Panel>
         <table>
              <tr><td colspan="2" align="center" class="style1">
            <br />
                  <asp:Button ID="Button5" runat="server" OnClick="Button5_Click" Text="Transfer" />
            <br />
            <br />
        </td></tr></table>
          </asp:Panel>
        
        <table><tr><td colspan="2">
            <asp:Panel ID="Panel2" runat="server" Visible="false" Width="329px">
            
            <table style="width:100%"><tr><td>
                <asp:Label ID="Label6" runat="server" Text="Transfer To :"></asp:Label>
            </td>
            <td>
                <asp:DropDownList ID="DropDownList1" runat="server" Height="22px" Width="174px">
                    <asp:ListItem>--Select--</asp:ListItem>
                    <asp:ListItem>Birthday</asp:ListItem>
                    <asp:ListItem>Marriage</asp:ListItem>
                    <asp:ListItem>Transfer to Savings</asp:ListItem>
                    <asp:ListItem>Other</asp:ListItem>
                </asp:DropDownList>
            </td></tr>

            <tr><td>
                <br />
                <asp:Label ID="Label8" runat="server" Text="Amount"></asp:Label></td>
                <td>
                    <br />
                    <asp:TextBox ID="TextBox6" Required="" runat="server"></asp:TextBox></td>
                </tr>

            <tr><td colspan="2" align="center">
                <br />
                <asp:Button ID="Button3" runat="server" Text="Done" Height="33px" 
                    onclick="Button3_Click" Width="79px" CssClass="intabular" />
                <br />
                </td></tr>

            </table>
            </asp:Panel>
        </td></tr>

        </table>
     
    </td></tr>
    </table>
   
    </asp:Content>
<asp:Content ID="Content1" runat="server" contentplaceholderid="head">
    <style type="text/css">
        .style1
        {
            width: 216px;
        }
    </style>
</asp:Content>

