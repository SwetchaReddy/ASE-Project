using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;
using System.Data;
using System.Data.SqlClient;

public partial class AddExp : System.Web.UI.Page
{
    SqlConnection con = new SqlConnection(@"Data Source=DESKTOP-0FDEL0V;Initial Catalog=exptrack;Integrated Security=True");
    protected void Page_Load(object sender, EventArgs e)
    {
        if (Session["Add"] == "Data")
        {
            String alertmsg = "Expense details added";
            ClientScript.RegisterStartupScript(this.GetType(), "myalert", "alert('" + alertmsg + "');", true);
            Session["Add"] = "";
        }
        TextBox1.Text = Session["uid"].ToString();
        try
        {      
            int s = 0;
            SqlDataAdapter da = new SqlDataAdapter("Select max(tid) from exp", con);
            DataSet ds = new DataSet();
            da.Fill(ds);
            s = Convert.ToInt32(ds.Tables[0].Rows[0][0]);
            s++;
            TextBox3.Text = Convert.ToString(s);

        }
        catch (Exception ex)
        {
            TextBox3.Text = "101";
        }
    }
    protected void Button1_Click(object sender, EventArgs e)
    {
        if (TextBox2.Text != "0")
        {
            string s = "select max(limit) from balance where uid='101'";
            SqlDataAdapter sda = new SqlDataAdapter(s, con);
            DataSet ds = new DataSet();
            sda.Fill(ds);
            int lim = Convert.ToInt32(ds.Tables[0].Rows[0][0].ToString());
            if (Convert.ToInt32(TextBox2.Text) > lim)
            {
                Panel1.Visible = true;
            }
            if (Panel1.Visible == false)
            {
                con.Open();
                string[] date = TextBox5.Text.Split('-');
                string year = date[0].ToString();
                string month = date[1].ToString();
                string day = date[2].ToString();
                string ins1 = "insert into exp values('" + TextBox3.Text + "','" + TextBox1.Text + "','" + TextBox2.Text + "','" + TextBox4.Text + "','" + day + "','" + month + "','" + year + "')";
                SqlCommand cmd = new SqlCommand(ins1, con);
                cmd.ExecuteNonQuery();
                con.Close();
                Session["Add"] = "Data";
                Response.Redirect("AddExp.aspx");
            }
        }
        else
        {
            String alertmsg = "0 value not accepted !";
            ClientScript.RegisterStartupScript(this.GetType(), "myalert", "alert('" + alertmsg + "');", true);
        }
    }
    protected void Button2_Click(object sender, EventArgs e)
    {
        string s = "update balance set limit='" + TextBox2.Text + "' where uid='" + Session["uid"] + "'";
        SqlCommand cmd = new SqlCommand(s, con);
        con.Open();
        cmd.ExecuteNonQuery();
        con.Close();
        Panel1.Visible = false;
        Session["Add"] = "Data";
        Response.Redirect("AddExp.aspx");
    }
    protected void Button3_Click(object sender, EventArgs e)
    {
        Panel1.Visible = false;
    }
}