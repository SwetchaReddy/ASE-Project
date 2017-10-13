using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data;
using System.Data.SqlClient;

public partial class Reg : System.Web.UI.Page
{
    SqlConnection con = new SqlConnection(@"Data Source=DESKTOP-0FDEL0V;Initial Catalog=exptrack;Integrated Security=True");
    protected void Page_Load(object sender, EventArgs e)
    {
        try
        {
            int s = 0;
            SqlDataAdapter da = new SqlDataAdapter("Select max(uid) from login", con);
            DataSet ds = new DataSet();
            da.Fill(ds);
            s = Convert.ToInt32(ds.Tables[0].Rows[0][0]);
            s++;
            txtuid.Text = Convert.ToString(s);
        }
        catch (Exception ex)
        {
            txtuid.Text = "101";
        }
    }
    protected void Button2_Click(object sender, EventArgs e)
    {
        try
        {
            if (txtusername.Text == "")
            {
                Page.ClientScript.RegisterStartupScript(GetType(), "msgtype", "alert('Enter User Name!!!')", true);
            }
            else
            {
                SqlDataAdapter da2 = new SqlDataAdapter("Select * from login where username='" + txtusername.Text + "'", con);
                DataSet ds2 = new DataSet();
                da2.Fill(ds2);
                if (ds2.Tables[0].Rows.Count == 0)
                {
                    lblusername.Text = "Username Available";
                }
                else
                {
                    lblusername.Text = "Username Not Available";
                }

                if (lblusername.Text == "Username Available")
                {
                    txtpassword.Enabled = true;
                }
                else
                {
                    txtpassword.Enabled = false;
                }
            }
        }
        catch (Exception ex) { }
    }
    protected void Button1_Click(object sender, EventArgs e)
    {
        if (txtfname.Text != "")
        {
            if (txtmname.Text != "")
            {
                if (txtlname.Text != "")
                {
                    if (txtemail.Text != "")
                    {
                        if (txtcontact.Text != "")
                        {
                            if (txtusername.Text != "")
                            {
                                if (txtpassword.Text != "")
                                {

                                    if (lblusername.Text == "Username Available")
                                    {
                                        try
                                        {
                                            con.Open();
                                            SqlCommand cmd = new SqlCommand("Insert into Login values('" + txtfname.Text + "','" + txtmname.Text + "','" + txtlname.Text + "','" + txtemail.Text + "','" + txtcontact.Text + "','" + txtcity.Text + "','" + txtaddress.Text + "','" + txtusername.Text + "','" + txtpassword.Text + "','" + Convert.ToInt32(txtuid.Text) + "','" + DropDownList1.SelectedItem.Value + "')", con);
                                            cmd.ExecuteNonQuery();
                                            con.Close();
                                            String alertmsg = "Thank You for Registering";
                                            ClientScript.RegisterStartupScript(this.GetType(), "myalert", "alert('" + alertmsg + "');", true);

                                            Response.Redirect("Login.aspx");
                                        }
                                        catch (FormatException exx)
                                        {

                                            SqlCommand cmd = new SqlCommand("Insert into Login values('" + txtfname.Text + "','" + txtmname.Text + "','" + txtlname.Text + "','" + txtemail.Text + "','" + txtcontact.Text + "','" + txtcity.Text + "','" + txtaddress.Text + "','" + txtusername.Text + "','" + txtpassword.Text + "','0','" + DropDownList1.SelectedItem.Value + "')", con);
                                            cmd.ExecuteNonQuery();
                                            con.Close();
                                            String alertmsg = "Thank You for Registering";
                                            ClientScript.RegisterStartupScript(this.GetType(), "myalert", "alert('" + alertmsg + "');", true);

                                            Response.Redirect("Login.aspx");
                                        }
                                    }
                                    else
                                    {
                                        String alertmsg = "Enter valid username";
                                        ClientScript.RegisterStartupScript(this.GetType(), "myalert", "alert('" + alertmsg + "');", true);

                                    }
                                }
                                else
                                { Label1.Visible = true; }
                            }
                            else
                            { Label1.Visible = true; }
                        }
                        else
                        { Label1.Visible = true; }
                    }
                    else
                    { Label1.Visible = true; }
                }
                else
                { Label1.Visible = true; }
            }
            else
            { Label1.Visible = true; }
        }
        else
        { Label1.Visible = true; }
    }
}